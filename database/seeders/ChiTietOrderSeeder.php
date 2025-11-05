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
                'loai_mon' => $faker->randomElement(['combo', 'goi_them']),
                'trang_thai' => ['cho_bep', 'dang_che_bien', 'da_len_mon', 'huy_mon'][rand(0, 3)],
                'ghi_chu' => $faker->sentence(),
                'created_at' => now()->subDays(rand(0, 5)),
                'updated_at' => now(),
            ]);
        }
    }
}