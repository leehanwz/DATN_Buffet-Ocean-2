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

        $comboIds = DB::table('combo_buffet')->pluck('id')->toArray();
        $monAnIds = DB::table('mon_an')->pluck('id')->toArray();

        $usedPairs = [];

        for ($i = 0; $i < 25; $i++) {
            do {
                $combo_id = $faker->randomElement($comboIds);
                $mon_an_id = $faker->randomElement($monAnIds);
                $pairKey = $combo_id . '-' . $mon_an_id;
            } while (isset($usedPairs[$pairKey]));

            $usedPairs[$pairKey] = true;

            DB::table('mon_trong_combo')->insert([
                'combo_id' => $combo_id,
                'mon_an_id' => $mon_an_id,
                'gioi_han_so_luong' => $faker->numberBetween(1, 5),
                'phu_phi_goi_them' => $faker->randomFloat(0, 10000, 30000),
                'trang_thai' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
