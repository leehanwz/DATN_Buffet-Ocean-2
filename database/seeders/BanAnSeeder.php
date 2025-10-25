<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BanAnSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('ban_an')->insert([
                'khu_vuc_id' => $faker->numberBetween(1, 5),
                'so_ban' => 'Bàn ' . $i,
                'ma_qr' => strtoupper($faker->bothify('QR##??')),
                'duong_dan_qr' => $faker->url(),
                'so_ghe' => $faker->numberBetween(2, 10),
                // sửa enum cho khớp migration
                'trang_thai' => $faker->randomElement(['trong', 'dang_phuc_vu', 'da_dat', 'khong_su_dung']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
