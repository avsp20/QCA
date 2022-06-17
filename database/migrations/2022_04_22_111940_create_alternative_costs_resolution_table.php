<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeCostsResolutionTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('alternative_costs_resolution')) {
			Schema::create('alternative_costs_resolution', function (Blueprint $table) {
				$table->id();
				$table->string('section1_heading')->nullable();
				$table->string('section1_sub_heading')->nullable();
				$table->longText('section1')->nullable();
				$table->string('section2_heading')->nullable();
				$table->string('section2_sub_heading')->nullable();
				$table->longText('section2')->nullable();
				$table->text('section2_image')->nullable();
				$table->longText('section3')->nullable();
				$table->string('text1')->nullable();
				$table->string('text1_url')->nullable();
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
		Schema::dropIfExists('alternative_costs_resolution');
	}
}
