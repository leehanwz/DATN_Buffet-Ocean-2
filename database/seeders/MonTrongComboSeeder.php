<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MonTrongComboSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            DB::table('mon_trong_combo')->insert([
                'combo_id' => $faker->numberBetween(1, 5),
                'mon_an_id' => $faker->numberBetween(1, 30),
                'gioi_han_so_luong' => $faker->numberBetween(1, 5),
                'phu_phi_goi_them' => $faker->randomFloat(0, 10000, 30000),
            ]);
        }
    }
}
