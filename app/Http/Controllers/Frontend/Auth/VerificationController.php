<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Mail;

class VerificationController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Email Verification Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller is responsible for handling email verification for any
		    | user that recently registered with the application. Emails may also
		    | be re-sent if the user didn't receive the original email message.
		    |
	*/

	use VerifiesEmails, RedirectsUsers;

	/**
	 * Where to redirect users after verification.
	 *
	 * @var string
	 */
	// protected $redirectTo = RouteServiceProvider::HOME;
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('signed')->only('verify');
		$this->middleware('throttle:6,1')->only('verify', 'resend');
	}

	public function show(Request $request) {
		return $request->user()->hasVerifiedEmail()
		? redirect($this->redirectPath())
		: view('frontend.emails.verify_register_user', [
			'pageTitle' => __('Account Verification'),
		]);
	}

	public function verify($id, $token) {
		$verifyUser = User::where('remember_token', $token)->first();
		$message    = 'Sorry your email cannot be identified.';
		if (!is_null($verifyUser)) {
			if (!$verifyUser->is_email_verified) {
				$verifyUser->user_is_active    = 1;
				$verifyUser->is_email_verified = 1;
				$verifyUser->email_verified_at = date('Y-m-d H:i:s');
				$verifyUser->save();
				// Send email to admin
				$data = array(
					'id'    => $verifyUser->id,
					'name'  => $verifyUser->user_fname . ' ' . $verifyUser->user_lname,
					'email' => $verifyUser->user_email,
				);
				// Store notifications
				Notification::insert([
					'user_id'    => $verifyUser->id,
					'label'      => 'User Email Verification',
					'message'    => 'You account is verified successfully.',
					'status'     => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				]);
				Mail::to(config('services.email'))->send(new \App\Mail\UserVerifiedMailToAdmin($data));
				$message = 'Your email is successfully verified. We have sent an email to administrator to review your account.';
			} else {
				$message = "Your e-mail is already verified. Your account is in review process, we'll get back to you.";
			}
		}
		return redirect()->route('front.home')->with('success', $message);
	}

	public function resendEmail(Request $request) {
		try {
			return view('frontend.emails.resend-email');
		} catch (Exception $e) {
			return redirect()->route('user.register')->with('error', $e->getMessage());
		}
	}

	protected function resend(Request $request) {
		$this->validate($request, [
			'email' => 'required|email|exists:users,user_email,deleted_at,NULL',
		]);
		$user = User::where('user_email', $request->email)->first();
		if (!$user) {
			return redirect()->route('verification.notice')->with('error', 'Something went wrong, try again later.');
		}
		event(new Registered($user));
		return redirect()->route('verification.notice')->with('success', 'You have registered successfully. We have sent you an email for verification, please verify to move forward.');
	}

	public function adminVerification(Request $request) {
		try {
			return view('frontend.emails.admin-verification');
		} catch (Exception $e) {
			return redirect()->route('user.register')->with('error', $e->getMessage());
		}
	}
}
