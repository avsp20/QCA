<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostManagementSetting extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'cost_management_settings';

	protected $fillable = [
		'section1_heading', 'section1_sub_heading', 'section1', 'section1_text1', 'section1_text2', 'section1_text3', 'section1_text4', 'section2_heading', 'section2_sub_heading', 'section2', 'section2_image', 'section3_heading', 'section3_sub_heading', 'section3', 'section4_heading', 'section4_sub_heading', 'section4', 'section4_image', 'section5_heading', 'section5_sub_heading', 'section5',
	];
}
