<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageSetting extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'home_page_settings';

	protected $fillable = [
		'section1', 'advice_image', 'drafting_image', 'settlement_conference_team_image', 'court_appearances_image', 'expert_report_image', 'alternative_costs_resolution_image', 'cle_seminars_image', 'instructions_forms_image', 'section2', 'section2_button_name', 'section2_button_link', 'section3', 'section3_image', 'text1', 'text2', 'text3', 'text4',
	];
}
