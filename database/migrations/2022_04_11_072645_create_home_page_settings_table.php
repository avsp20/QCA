<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('home_page_settings')) {
			Schema::create('home_page_settings', function (Blueprint $table) {
				$table->id();
				$table->longText('section1')->nullable();
				$table->string('advice_image')->nullable();
				$table->string('drafting_image')->nullable();
				$table->string('settlement_conference_team_image')->nullable();
				$table->string('court_appearances_image')->nullable();
				$table->string('expert_report_image')->nullable();
				$table->string('alternative_costs_resolution_image')->nullable();
				$table->string('cle_seminars_image')->nullable();
				$table->string('instructions_forms_image')->nullable();
				$table->longText('section2')->nullable();
				$table->string('section2_button_name')->nullable();
				$table->string('section2_button_link')->nullable();
				$table->longText('section3')->nullable();
				$table->string('section3_image')->nullable();
				$table->string('text1')->nullable();
				$table->string('text2')->nullable();
				$table->string('text3')->nullable();
				$table->string('text4')->nullable();
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
		Schema::dropIfExists('home_page_settings');
	}
}
