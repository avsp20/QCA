<?php

namespace App\Http\Requests\Backend;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'user_fname' => 'required|regex:/^[a-zA-Z]+$/u',
			'user_lname' => 'required|regex:/^[a-zA-Z]+$/',
			'user_email' => 'required|unique:users,user_email,' . Auth::guard('admin')->user()->id . ',id,deleted_at,NULL',
			'user_contact_main' => 'required|numeric',
			'user_contact_mobile' => 'nullable|numeric',
			'user_location' => 'required|min:2|max:300',
		];
	}

	public function messages() {
		return [
			'user_fname.required' => 'The first name field is required.',
			'user_lname.required' => 'The last name field is required.',
			'user_email.required' => 'The email field is required.',
			'user_contact_main.required' => 'The primary contact field is required.',
			'user_contact_main.numeric' => 'The primary contact must be a number.',
			'user_contact_mobile.numeric' => 'The secondary contact must be a number.',
			'user_location.required' => 'The location field is required.',
		];
	}
}
