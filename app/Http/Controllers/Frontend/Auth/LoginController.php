<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
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
		$this->middleware('guest:web', ['except' => ['logout']]);
	}

	protected function guard() {
		return Auth::guard('web');
	}

	public function frontendShowLoginForm() {
		return view('frontend.auth.login');
	}

	public function login(Request $request) {
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);
		if (Auth::attempt(['user_email' => $request->email, 'password' => $request->password])) {
			$user = User::where('user_email', $request->email)->first();
			if ($user) {
				$user_role = UserRole::where('user_id', $user->id)->where('role_id', 2)->first();
				if ($user_role) {
					if ($user_role->role_id == 2) {
						Auth::login($user);
						return redirect()->route('user.dashboard')->with('success', 'Loggedin successfully');
					} else {
						return redirect()->route('user.login')->with('error', 'Invalid Login');
					}
				} else {
					return redirect()->route('user.login')->with('error', 'Invalid Login');
				}
			} else {
				return redirect()->route('user.login')->with('error', 'Invalid Login');
			}
		} else {
			return redirect()->route('user.login')->with('error', 'Invalid Login');
		}
	}

	public function logout() {
		Auth::logout();
		return redirect()->route('front.home');
	}

}
