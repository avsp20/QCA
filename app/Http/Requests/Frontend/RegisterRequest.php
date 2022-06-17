<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
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
			'fname' => 'required|regex:/^[a-zA-Z]+$/u',
			'lname' => 'required|regex:/^[a-zA-Z]+$/u',
			'company_name' => 'required',
			'location' => 'required|not_in:0',
			'email' => 'required|unique:users,user_email,NULL,id,deleted_at,NULL',
			'main_phone' => 'required|numeric',
			'mobile' => 'nullable|numeric',
			'accept_terms' => 'accepted',
		];
	}

	public function messages() {
		return [
			'fname.required' => 'The first name is required.',
			'lname.required' => 'The last name is required.',
			'location.not_in' => 'The location is required.',
			'main_phone.required' => 'The main company phone is required.',
			'main_phone.numeric' => 'The main company phone must be a number.',
			'mobile.numeric' => 'The mobile must be a number.',
		];
	}
}
