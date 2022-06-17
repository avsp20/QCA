<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('contact_us')) {
			Schema::create('contact_us', function (Blueprint $table) {
				$table->id();
				$table->string('enquiries_email')->nullable();
				$table->string('general_information_and_administration_email')->nullable();
				$table->string('privacy_email')->nullable();
				$table->string('it_email')->nullable();
				$table->string('legal_email')->nullable();
				$table->text('address')->nullable();
				$table->string('contact')->nullable();
				$table->string('email')->nullable();
				$table->string('website')->nullable();
				$table->text('other_details')->nullable();
				$table->longText('map')->nullable();
				$table->string('phone')->nullable();
				$table->string('registered_company')->nullable();
				$table->string('acn')->nullable();
				$table->string('abn')->nullable();
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
		Schema::dropIfExists('contact_us');
	}
}
