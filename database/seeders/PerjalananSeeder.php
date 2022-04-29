<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('perjalanans')->insert([
                'id_user' => $faker->unique()->numberBetween(1, 50),
                'lokasi' => $faker->city,
                'tanggal' => $faker->date,
                'jam' => $faker->time,
                'suhu' => $faker->numberBetween(30, 50)
            ]);
        }
    }
}
