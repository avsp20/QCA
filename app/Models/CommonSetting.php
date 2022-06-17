<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommonSetting extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'common_settings';

	protected $fillable = [
		'page_id', 'section1_heading', 'section1_sub_heading', 'section1',
	];
}
