<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MonAnSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $trang_thais = ['con', 'het', 'an'];
        $loai_mons = ['Món chính', 'Khai vị', 'Tráng miệng', 'Đồ uống'];

        for ($i = 0; $i < 30; $i++) {
            DB::table('mon_an')->insert([
                'danh_muc_id' => $faker->numberBetween(1, 5),
                'ten_mon' => ucfirst($faker->word()) . ' ' . $faker->word(),
                'gia' => $faker->randomFloat(0, 50000, 200000),
                'mo_ta' => $faker->sentence(),
                'hinh_anh' => $faker->imageUrl(400, 300, 'food', true),
                
                'trang_thai' => $faker->randomElement($trang_thais),
                
                'thoi_gian_che_bien' => $faker->numberBetween(5, 30),
                
                'loai_mon' => $faker->randomElement($loai_mons),
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}