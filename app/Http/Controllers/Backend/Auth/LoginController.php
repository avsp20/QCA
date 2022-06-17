<?php

namespace App\Http\Controllers\Backend\Auth;

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
	protected $redirectTo = 'admin/dashboard';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}

	protected function guard() {
		return Auth::guard('admin');
	}

	public function showLoginForm() {
		return view('backend.auth.login');
	}

	public function login(Request $request) {
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);
		if (Auth::guard('admin')->attempt(['user_email' => $request->email, 'password' => $request->password])) {
			$user = User::where('user_email', $request->email)->first();
			if ($user) {
				$user_role = UserRole::where('user_id', $user->id)->where('role_id', 1)->first();
				if ($user_role) {
					if ($user_role->role_id == 1) {
						Auth::guard('admin')->login($user);
						return redirect()->route('admin.dashboard')->with('success', 'Loggedin successfully');
					} else {
						Auth::guard('admin')->logout();
						return redirect()->back()->with('error', 'Invalid Login');
					}
				} else {
					return redirect()->route('login')->with('error', 'Invalid Login');
				}
			} else {
				return redirect()->route('login')->with('error', 'Invalid Login');
			}
		} else {
			return redirect()->route('login')->with('error', 'Invalid Login');
		}
	}

	public function logout() {
		Auth::guard('admin')->logout();
		return redirect()->route('login');
	}
}
