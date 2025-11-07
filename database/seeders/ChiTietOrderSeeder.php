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

        // Lấy danh sách id từ các bảng liên quan
        $orderIds = DB::table('order_mon')->pluck('id')->toArray();
        $monAnIds = DB::table('mon_an')->pluck('id')->toArray();

        // Nếu chưa có dữ liệu thì cảnh báo
        if (empty($orderIds) || empty($monAnIds)) {
            $this->command->warn('⚠️ Vui lòng seed dữ liệu cho bảng order_mon và mon_an trước!');
            return;
        }

        // Fake dữ liệu chi tiết order
        for ($i = 0; $i < 50; $i++) {
            DB::table('chi_tiet_order')->insert([
                'order_id'   => $faker->randomElement($orderIds),
                'mon_an_id'  => $faker->randomElement($monAnIds),
                'so_luong'   => $faker->numberBetween(1, 5),
                'loai_mon'   => $faker->randomElement(['combo', 'goi_them']), // ✅ chỉ 2 giá trị này thôi
                'trang_thai' => $faker->randomElement([
                    'cho_bep',
                    'dang_che_bien',
                    'da_len_mon',
                    'huy_mon'
                ]),
                'ghi_chu'    => $faker->optional(0.3)->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
