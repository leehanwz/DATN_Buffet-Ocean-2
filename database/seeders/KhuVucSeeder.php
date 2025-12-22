<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KhuVucSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('khu_vuc')->insert([
                'ten_khu_vuc' => 'Khu vực ' . strtoupper($faker->randomLetter),
                'mo_ta' => $faker->sentence(),
                'tang' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
