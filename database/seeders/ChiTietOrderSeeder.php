<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChiTietOrderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        for ($i = 1; $i <= 30; $i++) {
            DB::table('chi_tiet_order')->insert([
                'order_id'   => $faker->numberBetween(1, 20), // giả sử có 20 order_mon
                'mon_an_id'  => $faker->numberBetween(1, 30), // giả sử có 30 món ăn
                'so_luong'   => $faker->numberBetween(1, 5),
                'loai_mon'   => $faker->randomElement(['combo', 'goi_them']),
                'trang_thai' => $faker->randomElement(['cho_bep', 'dang_che_bien', 'da_len_mon', 'huy_mon']),
                'ghi_chu'    => $faker->optional()->randomElement([
                    'Ít cay',
                    'Thêm nước chấm',
                    'Không hành',
                    'Làm chín kỹ giúp khách',
                    'Bỏ đá',
                    'Thêm rau ăn kèm',
                    'Khách yêu cầu làm nhanh',
                    'Mang ra sau món chính',
                    'Dọn sớm',
                    'Gọi thêm phần nhỏ'
                ]),
                'created_at' => now()->subDays($faker->numberBetween(0, 5))->addHours($faker->numberBetween(0, 23)),
                'updated_at' => now(),
            ]);
        }
    }
}
