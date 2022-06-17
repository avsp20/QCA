<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('cms')) {
			Schema::create('cms', function (Blueprint $table) {
				$table->id();
				$table->string('name')->nullable();
				$table->string('slug')->nullable();
				$table->longText('content')->nullable();
				$table->tinyInteger('status')->default(0)->nullable();
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
		Schema::dropIfExists('cms');
	}
}
