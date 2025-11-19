<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderMonSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        $banIds = DB::table('ban_an')->pluck('id')->toArray();
        $datBanIds = DB::table('dat_ban')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('order_mon')->insert([
                'dat_ban_id' => $faker->randomElement($datBanIds),
                'ban_id'     => $faker->randomElement($banIds),
                'tong_tien'  => $faker->numberBetween(500000, 2000000),
                'trang_thai' => $faker->randomElement(['dang_xu_li', 'hoan_thanh']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
