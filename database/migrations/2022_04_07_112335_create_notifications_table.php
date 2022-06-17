<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('notifications')) {
			Schema::create('notifications', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('user_id')->unsigned()->nullable();
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
				$table->bigInteger('qna_id')->unsigned()->nullable();
				$table->foreign('qna_id')->references('id')->on('qna')->onDelete('cascade');
				$table->string('label')->nullable();
				$table->text('message')->nullable();
				$table->tinyInteger('status')->default(0);
				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('notifications');
	}
}
