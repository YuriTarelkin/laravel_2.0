<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('categories')->insert($this->getData());
    }

	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i=0; $i < 10; $i++) {
			$data[] = [
				'title'  => $faker->jobTitle(),
				'description' =>  $faker->text(100)
			];
		}

		return $data;
	}
}
