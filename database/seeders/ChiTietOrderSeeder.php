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

        // Lấy danh sách order và món
        $orderIds = DB::table('order_mon')->pluck('id')->toArray();
        $monAnIds = DB::table('mon_an')->pluck('id')->toArray();

        if (empty($orderIds) || empty($monAnIds)) {
            $this->command->warn('⚠️ Vui lòng seed dữ liệu cho bảng order_mon và mon_an trước!');
            return;
        }

        foreach ($orderIds as $index => $orderId) {
            // Chia làm 2 loại order: 50% hoàn thành, 50% chưa hoàn thành
            $allComplete = $index % 2 === 0; // even index → hoàn thành

            foreach (range(1, 2) as $i) {
                DB::table('chi_tiet_order')->insert([
                    'order_id'   => $orderId,
                    'mon_an_id'  => $faker->randomElement($monAnIds),
                    'so_luong'   => $faker->numberBetween(1, 3),
                    'loai_mon'   => $faker->randomElement(['combo', 'goi_them']),
                    'trang_thai' => $allComplete
                        ? 'da_len_mon'                       // tất cả món đã lên → order sẽ hoàn thành
                        : $faker->randomElement(['cho_bep', 'dang_che_bien']), // order chưa hoàn thành
                    'ghi_chu'    => $faker->optional(0.3)->sentence(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('✅ Fake dữ liệu ChiTietOrder xong!');
    }
}
