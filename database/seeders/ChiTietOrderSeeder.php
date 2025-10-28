<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChiTietOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $orderIds = DB::table('order_mon')->pluck('id')->toArray();
        $monIds = DB::table('mon_an')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('chi_tiet_order')->insert([
                'order_id' => $faker->randomElement($orderIds),
                'mon_an_id' => $faker->randomElement($monIds),
                'so_luong' => $faker->numberBetween(1, 5),
                'loai_mon' => $faker->randomElement(['Khai vị', 'Món chính', 'Tráng miệng']),
                'trang_thai' => $faker->randomElement(['Đã gọi', 'Đang chế biến', 'Đã phục vụ']),
                'ghi_chu' => $faker->sentence(),
                'ngay_tao' => now()->subDays(rand(0, 5)),
                'ngay_cap_nhat' => now(),
            ]);
        }
    }
}
