<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('users')) {
			Schema::create('users', function (Blueprint $table) {
				$table->id();
				$table->tinyInteger('user_is_active')->default(0);
				$table->tinyInteger('user_is_approved')->default(0);
				$table->string('user_fname')->nullable();
				$table->string('user_lname')->nullable();
				$table->string('user_company')->nullable();
				$table->string('user_location')->nullable();
				$table->string('user_email')->nullable();
				$table->string('user_contact_main', 20)->nullable();
				$table->string('user_contact_mobile', 20)->nullable();
				$table->longText('user_initial_notes')->nullable();
				$table->timestamp('user_datetime_registered')->nullable();
				$table->longText('user_datetime_lastlogin')->nullable();
				$table->longText('user_ip_address')->nullable();
				$table->string('user_password')->nullable();
				$table->timestamp('user_password_last_reset_changed')->nullable();
				$table->timestamp('email_verified_at')->nullable();
				$table->rememberToken();
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
		Schema::dropIfExists('users');
	}
}
