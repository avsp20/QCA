<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PageSettingsRequest extends FormRequest {
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
			'page' => 'required|not_in:0',
			'title' => 'nullable|min:2',
			'short_description' => 'nullable|min:2',
			'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
		];
	}
}
