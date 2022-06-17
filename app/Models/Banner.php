<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'banners';

	protected $fillable = [
		'page_id', 'banner_image',
	];

	public function page() {
		return $this->hasOne(Page::class, 'id', 'page_id');
	}
}
