<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DatBanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $year = now()->year;

        for ($i = 1; $i <= 6; $i++) {
            for ($j = 0; $j < rand(3, 8); $j++) {
                DB::table('dat_ban')->insert([
                    'ten_khach' => $faker->name(),
                    'sdt_khach' => $faker->phoneNumber(),
                    'so_khach' => rand(2, 10),
                    'ban_id' => rand(1, 15),
                    'ngay_tao' => Carbon::createFromDate($year, $i, rand(1, 28)),
                    'ngay_cap_nhat' => now(),
                ]);
            }
        }
    }
}
