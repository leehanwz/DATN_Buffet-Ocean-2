<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $datBanIds = DB::table('dat_ban')->pluck('id')->toArray();
        $year = now()->year;

        for ($i = 0; $i < 10; $i++) {
            DB::table('hoa_don')->insert([
                'dat_ban_id' => $datBanIds[array_rand($datBanIds)],
                'tong_tien' => rand(200000, 1000000),
                'created_at' => Carbon::createFromDate($year, $i, rand(1, 28)),
                'updated_at' => now(),
            ]);
        }
    }
}