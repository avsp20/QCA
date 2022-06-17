<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('employment')) {
			Schema::create('employment', function (Blueprint $table) {
				$table->id();
				$table->string('first_name')->nullable();
				$table->string('last_name')->nullable();
				$table->text('address')->nullable();
				$table->string('suburb')->nullable();
				$table->string('state')->nullable();
				$table->string('postcode')->nullable();
				$table->string('contact_no', 13)->nullable();
				$table->string('email')->nullable();
				$table->tinyInteger('is_solicitor')->default(0)->nullable();
				$table->year('year_admitted')->nullable();
				$table->tinyInteger('having_cost_draft_experience')->default(0)->nullable();
				$table->tinyInteger('cost_draft_experience')->default(0)->nullable();
				$table->text('jurisdiction')->nullable();
				$table->text('upload_file')->nullable();
				$table->longText('additional_comments')->nullable();
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
		Schema::dropIfExists('employment');
	}
}
