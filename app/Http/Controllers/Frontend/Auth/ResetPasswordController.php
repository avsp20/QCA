<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Password Reset Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller is responsible for handling password reset requests
		    | and uses a simple trait to include this behavior. You're free to
		    | explore this trait and override any methods you wish to tweak.
		    |
	*/

	use ResetsPasswords;

	/**
	 * Where to redirect users after resetting their password.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	public function showResetForm($token) {
		return view('frontend.auth.passwords.reset', ['token' => $token]);
	}

	public function reset(Request $request) {
		$this->validate($request, [
			'email'            => 'required|email',
			'password'         => 'required|string|min:6',
			'confirm_password' => 'required|required_with:password|same:password',
		], [
			'confirm_password.required' => 'The confirm password field is required.',
		]);
		$updatePassword = PasswordReset::where('email', $request->email)->where('token', $request->token)->first();
		if (!$updatePassword) {
			return back()->withInput()->with('error', 'Invalid token!');
		}

		$user = User::where('user_email', $request->email)->update([
			'user_password' => Hash::make($request->password),
		]);
		PasswordReset::where(['email' => $request->email])->delete();

		return redirect()->back()->with('success', 'Your password has been changed!');
	}
}
