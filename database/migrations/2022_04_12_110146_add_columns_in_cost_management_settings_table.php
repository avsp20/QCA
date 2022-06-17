<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInCostManagementSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('cost_management_settings', function (Blueprint $table) {
			$table->string('section1_text1')->after('section1')->nullable();
			$table->string('section1_text2')->after('section1_text1')->nullable();
			$table->string('section1_text3')->after('section1_text2')->nullable();
			$table->string('section1_text4')->after('section1_text3')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('cost_management_settings', function (Blueprint $table) {
			$table->dropColumn('section1_text1');
			$table->dropColumn('section1_text2');
			$table->dropColumn('section1_text3');
			$table->dropColumn('section1_text4');
		});
	}
}
