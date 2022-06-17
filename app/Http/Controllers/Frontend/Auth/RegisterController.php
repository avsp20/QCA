<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegisterRequest;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Auth;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Str;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	public function frontendShowRegisterForm() {
		$locations = Frontpages::locations();
		return view('frontend.auth.register', compact('locations'));
	}

	public function register(RegisterRequest $request) {
		try {
			DB::beginTransaction();
			$user = new User();
			$token = sha1($request->email);
			$user->user_fname = $request->fname;
			$user->user_lname = $request->lname;
			$user->user_company = $request->company_name;
			$user->user_location = $request->location;
			$user->user_email = $request->email;
			$user->user_contact_main = $request->main_phone;
			$user->user_contact_mobile = $request->mobile;
			$user->user_initial_notes = $request->additional_note;
			$user->remember_token = $token;
			if ($user->save()) {
				$user_role = new UserRole();
				$user_role->user_id = $user->id;
				$user_role->role_id = 2;
				if ($user_role->save()) {
					$user->email = $user->user_email;
					$user->token = $token;
					event(new Registered($user));
					Auth::login($user);
					return redirect()->route('verification.notice')->with('success', 'You have registered successfully. We have sent you an email for verification, please verify to move forward.');
				} else {
					return redirect()->route('user.register')->with('error', 'Something went wrong, please try again later.');
				}
			} else {
				DB::commit();
				return redirect()->route('user.register')->with('error', 'Something went wrong, please try again later.');
			}
		} catch (Exception $e) {
			DB::rollback();
			return redirect()->route('user.register')->with('error', $e->getMessage());
		}
	}

	public function verifyUser(Request $request) {
		try {
			return view('frontend.emails.user_verify');
		} catch (Exception $e) {
			return redirect()->route('user.register')->with('error', $e->getMessage());
		}
	}
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\Models\User
	 */
	protected function create(array $data) {
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}
}
