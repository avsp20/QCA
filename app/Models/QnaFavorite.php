<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QnaFavorite extends Model {
	use HasFactory, SoftDeletes;

	protected $table = 'qna_favorites';

	protected $fillable = [
		'qna_id', 'user_id',
	];

	public function qna() {
		return $this->hasOne(Qna::class, 'id', 'qna_id');
	}
}
