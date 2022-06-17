<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMS extends Model {
	use HasFactory;

	use SoftDeletes;

	protected $table = 'cms';

	protected $fillable = [
		'name', 'slug', 'content', 'status',
	];
}
