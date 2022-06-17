<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model {
	use HasFactory;

	protected $table = 'employment';

	protected $fillable = [
		'first_name', 'last_name', 'address', 'suburb', 'state', 'postcode', 'contact_no', 'email', 'is_solicitor', 'year_admitted', 'having_cost_draft_experience', 'cost_draft_experience', 'jurisdiction', 'upload_file', 'additional_comments',
	];
}
