<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qna extends Model {
	use HasFactory, SoftDeletes;

	protected $table = 'qna';

	protected $fillable = [
		'qna_is_active', 'qna_user_id', 'qna_subject', 'qna_jurisdiction', 'qna_question_date', 'qna_question', 'qna_answer_date', 'qna_answer', 'qna_can_discuss_further', 'qna_available_to_others',
	];

	public function qna_favorites() {
		return $this->hasOne(QnaFavorite::class, 'qna_id', 'id');
	}

	public function user() {
		return $this->belongsTo(User::class, 'qna_user_id', 'id');
	}
}
