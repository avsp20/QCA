<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('banners')) {
			Schema::create('banners', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('page_id')->unsigned()->nullable();
				$table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
				$table->string('banner_image')->nullable();
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
		Schema::dropIfExists('banners');
	}
}
