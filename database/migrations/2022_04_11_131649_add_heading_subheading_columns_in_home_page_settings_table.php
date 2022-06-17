<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeadingSubheadingColumnsInHomePageSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('home_page_settings', function (Blueprint $table) {
			$table->string('section1_heading')->after('id')->nullable();
			$table->string('section1_sub_heading')->after('section1_heading')->nullable();
			$table->string('section2_heading')->after('instructions_forms_image')->nullable();
			$table->string('section2_sub_heading')->after('section2_heading')->nullable();
			$table->string('section3_heading')->after('section2_button_link')->nullable();
			$table->string('section3_sub_heading')->after('section3_heading')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('home_page_settings', function (Blueprint $table) {
			$table->dropColumn('section1_heading');
			$table->dropColumn('section1_sub_heading');
			$table->dropColumn('section2_heading');
			$table->dropColumn('section2_sub_heading');
			$table->dropColumn('section3_heading');
			$table->dropColumn('section3_sub_heading');
		});
	}
}
