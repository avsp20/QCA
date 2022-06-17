<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostDrafting extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'cost_drafting';

	protected $fillable = [
		'section1_heading', 'section1_sub_heading', 'section1', 'section2_heading', 'section2_sub_heading', 'section2', 'section2_image', 'section3_heading', 'section3_sub_heading', 'section3',
	];
}
