<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChiTietOrderSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy danh sách ID sẵn có
        $orderIds = DB::table('order_mon')->pluck('id')->toArray();
        $monAnIds = DB::table('mon_an')->pluck('id')->toArray();

        if (empty($orderIds) || empty($monAnIds)) {
            $this->command->warn('⚠️ Chưa có dữ liệu trong bảng order_mon hoặc mon_an. Bỏ qua seeder chi_tiet_order.');
            return;
        }

        $records = [];

        for ($i = 0; $i < 30; $i++) {
            $records[] = [
                'order_id'   => $orderIds[array_rand($orderIds)],
                'mon_an_id'  => $monAnIds[array_rand($monAnIds)],
                'so_luong'   => rand(1, 5),
                'loai_mon'   => collect(['combo', 'goi_them'])->random(),
                'trang_thai' => collect(['cho_bep', 'dang_che_bien', 'da_len_mon', 'huy_mon'])->random(),
                'ghi_chu'    => rand(0, 1) ? fake()->sentence() : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('chi_tiet_order')->insert($records);

        $this->command->info('✅ Đã tạo giả 30 chi tiết order thành công!');
    }
}
