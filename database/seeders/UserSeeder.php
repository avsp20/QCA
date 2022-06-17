<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$users = [
			[
				'id' => 1,
				'user_fname' => 'Admin',
				'user_lname' => 'Admin',
				'user_email' => 'admin@admin.com',
				'user_password' => \Hash::make('password'),
				'remember_token' => null,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			],
		];
		if (User::insert($users)) {
			$newUser = UserRole::updateOrCreate([
				'user_id' => 1,
			], [
				'role_id' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			]);
		}
	}
}
