<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('common_settings')) {
			Schema::create('common_settings', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('page_id')->unsigned()->nullable();
				$table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
				$table->string('section1_heading')->nullable();
				$table->string('section1_sub_heading')->nullable();
				$table->longText('section1')->nullable();
				$table->timestamps();
				$table->SoftDeletes();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('common_settings');
	}
}
