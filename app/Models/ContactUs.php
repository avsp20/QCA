<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'contact_us';

	protected $fillable = [
		'enquiries_email', 'general_information_and_administration_email', 'privacy_email', 'it_email', 'legal_email', 'address', 'contact', 'email', 'website', 'other_details', 'map', 'phone', 'registered_company', 'acn', 'abn',
	];
}
