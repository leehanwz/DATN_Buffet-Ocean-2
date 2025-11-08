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

        // Lấy danh sách id từ các bảng có sẵn
        $datBanIds = DB::table('dat_ban')->pluck('id')->toArray();
        $banIds = DB::table('ban_an')->pluck('id')->toArray();

        if (empty($datBanIds) || empty($banIds)) {
            $this->command->warn('⚠️ Vui lòng seed dữ liệu cho bảng dat_ban và ban_an trước!');
            return;
        }

        for ($i = 0; $i < 25; $i++) {
            DB::table('order_mon')->insert([
                'dat_ban_id' => $faker->randomElement($datBanIds),
                'ban_id' => $faker->randomElement($banIds),
                'tong_mon' => $faker->numberBetween(1, 10),
                'tong_tien' => $faker->randomFloat(2, 100000, 2000000),

                'trang_thai' => $faker->randomElement([
                    'cho_bep',
                    'dang_che_bien',
                    'da_len_mon',
                    'huy_mon'
                ]),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
