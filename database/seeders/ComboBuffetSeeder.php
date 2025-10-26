<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComboBuffetSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++) {
            DB::table('combo_buffet')->insert([
                'ten_combo' => 'Combo ' . ucfirst($faker->word()),
                'loai_combo' => $faker->randomElement(['Trưa', 'Tối', 'Cuối tuần']),
                'gia_co_ban' => $faker->randomFloat(0, 300000, 800000),
                'thoi_luong_phut' => $faker->numberBetween(60, 150),
                'thoi_gian_bat_dau' => $faker->dateTimeBetween('-1 days', 'now'),
                'thoi_gian_ket_thuc' => $faker->dateTimeBetween('now', '+2 days'),
                'trang_thai' => $faker->randomElement(['Hoạt động', 'Tạm ngưng']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
