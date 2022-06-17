<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnaTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('qna')) {
			Schema::create('qna', function (Blueprint $table) {
				$table->id();
				$table->tinyInteger('qna_is_active')->default(1);
				$table->bigInteger('qna_user_id')->unsigned()->nullable();
				$table->foreign('qna_user_id')->references('id')->on('users')->onDelete('cascade');
				$table->string('qna_subject')->nullable();
				$table->string('qna_jurisdiction', 100)->nullable();
				$table->timestamp('qna_question_date')->nullable();
				$table->text('qna_question')->nullable();
				$table->timestamp('qna_answer_date')->nullable();
				$table->longText('qna_answer')->nullable();
				$table->tinyInteger('qna_can_discuss_further')->default(0);
				$table->tinyInteger('qna_available_to_others')->default(0);
				$table->timestamps();
				$table->softDeletes();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('qna');
	}
}
