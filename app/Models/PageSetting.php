<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageSetting extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'front_page_settings';

	protected $fillable = [
		'page', 'title', 'short_description', 'banner_image',
	];
}
