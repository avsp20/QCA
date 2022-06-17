<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostDraftingTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('cost_drafting')) {
			Schema::create('cost_drafting', function (Blueprint $table) {
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
		Schema::dropIfExists('cost_drafting');
	}
}
