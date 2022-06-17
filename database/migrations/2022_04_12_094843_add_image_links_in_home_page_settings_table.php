<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageLinksInHomePageSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('home_page_settings', function (Blueprint $table) {
			$table->string('advice_link')->after('advice_image')->nullable();
			$table->string('drafting_link')->after('drafting_image')->nullable();
			$table->string('settlement_conference_team_link')->after('settlement_conference_team_image')->nullable();
			$table->string('court_appearances_link')->after('court_appearances_image')->nullable();
			$table->string('expert_reports_link')->after('expert_report_image')->nullable();
			$table->string('alternative_costs_resolution_link')->after('alternative_costs_resolution_image')->nullable();
			$table->string('cle_seminars_link')->after('cle_seminars_image')->nullable();
			$table->string('instruction_forms_link')->after('instructions_forms_image')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('home_page_settings', function (Blueprint $table) {
			$table->dropColumn('advice_link');
			$table->dropColumn('drafting_link');
			$table->dropColumn('settlement_conference_team_link');
			$table->dropColumn('court_appearances_link');
			$table->dropColumn('expert_reports_link');
			$table->dropColumn('alternative_costs_resolution_link');
			$table->dropColumn('cle_seminars_link');
			$table->dropColumn('instruction_forms_link');
		});
	}
}
