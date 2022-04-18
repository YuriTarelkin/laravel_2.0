<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('scources')->insert($this->getData());
    }

	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i=0; $i < 100; $i++) {
			$data[] = [
				'name'  => $faker->jobTitle(),
				'url' =>  $faker->text(100)
			];
		}

		return $data;
	}
}
