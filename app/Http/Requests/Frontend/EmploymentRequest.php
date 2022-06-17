<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentRequest extends FormRequest {
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
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'suburb' => 'required',
			'state' => 'required|not_in:0',
			'postcode' => 'required',
			'contact_no' => 'required|numeric',
			'email' => 'required',
			'is_solicitor' => 'required|not_in:0',
			'having_cost_draft_experience' => 'required|not_in:0',
			'cost_draft_experience' => 'required|not_in:0',
			'upload_file' => 'nullable|mimes:pdf,doc,docx|max:2048',
			'captcha_code' => 'required',
		];
	}

	public function messages() {
		return [
			'is_solicitor.required' => 'Please select atleast one option.',
			'having_cost_draft_experience.required' => 'Please select atleast one option.',
			'captcha_code.required' => 'The captcha code must required.',
		];
	}
}
