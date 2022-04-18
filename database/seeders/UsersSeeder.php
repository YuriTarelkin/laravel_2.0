<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('users')->insert($this->getData());
	}
	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i=0; $i < 10; $i++) {
			$data[] = [
				'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => 'pass',
                'remember_token' => $faker->text(10)
			];
		}

		return $data;
	}

}
