<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail;

class ForgotPasswordController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Password Reset Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller is responsible for handling password reset emails and
		    | includes a trait which assists in sending these notifications from
		    | your application to your users. Feel free to explore this trait.
		    |
	*/

	use SendsPasswordResetEmails;

	protected function guard() {
		return Auth::guard('web');
	}
	public function __construct() {
		$this->middleware('guest:web');
	}

	public function showLinkRequestForm() {
		return view('frontend.auth.passwords.email');
	}

	public function sendResetLinkEmail(Request $request) {
		try {
			$this->validate($request, [
				'email' => 'required|email',
			], [
				'email.required' => 'The email is required.',
			]);
			$user = User::with('user_role')->where('user_email', $request->email)->first();
			if (empty($user)) {
				return redirect()->back()->with('error', 'This email is Unregister.');
			} else {
				if ($user->user_is_active == 1) {
					if ($user->user_role->role_id == 2) {
						PasswordReset::insert([
							'email'      => $request->email,
							'token'      => $request->_token,
							'created_at' => date('Y-m-d H:i:s'),
						]);
						Mail::send('frontend.emails.forget-password', ['token' => $request->_token, 'role' => $user->user_role->role_id], function ($message) use ($request) {
							$message->to($request->email);
							$message->subject('Reset Password');
						});
						return redirect()->back()->with('success', 'We have e-mailed your password reset link!');
					} else {
						return redirect()->back()->with('error', 'Sorry, You are not user.');
					}
				} else {
					return redirect()->back()->with('error', 'Your account is not activated. Please activate it first.');
				}
			}
		} catch (Exception $e) {
			return redirect()->back()->with($e->getMessage());
		}
	}
}
