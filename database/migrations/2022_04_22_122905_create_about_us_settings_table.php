<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('about_us_settings')) {
			Schema::create('about_us_settings', function (Blueprint $table) {
				$table->id();
				$table->string('section1_heading')->nullable();
				$table->string('section1_sub_heading')->nullable();
				$table->longText('section1')->nullable();
				$table->string('section2_heading')->nullable();
				$table->string('section2_sub_heading')->nullable();
				$table->longText('section2')->nullable();
				$table->text('section2_image')->nullable();
				$table->string('section3_heading')->nullable();
				$table->string('section3_sub_heading')->nullable();
				$table->longText('section3')->nullable();
				$table->string('section4_heading')->nullable();
				$table->string('section4_sub_heading')->nullable();
				$table->longText('section4')->nullable();
				$table->text('section4_image')->nullable();
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
		Schema::dropIfExists('about_us_settings');
	}
}
