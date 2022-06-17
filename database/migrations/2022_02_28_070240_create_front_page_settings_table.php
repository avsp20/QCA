<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontPageSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('front_page_settings')) {
			Schema::create('front_page_settings', function (Blueprint $table) {
				$table->id();
				$table->string('page')->nullable();
				$table->string('title')->nullable();
				$table->text('short_description')->nullable();
				$table->text('banner_image')->nullable();
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
		Schema::dropIfExists('front_page_settings');
	}
}
