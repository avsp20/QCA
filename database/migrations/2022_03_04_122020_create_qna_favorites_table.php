<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnaFavoritesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('qna_favorites')) {
			Schema::create('qna_favorites', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('qna_id')->unsigned()->nullable();
				$table->foreign('qna_id')->references('id')->on('qna')->onDelete('cascade');
				$table->bigInteger('user_id')->unsigned()->nullable();
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::dropIfExists('qna_favorites');
	}
}
