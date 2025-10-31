<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucMonSeeder extends Seeder
{
    public function run(): void
    {
        $list = ['Hải sản', 'Thịt nướng', 'Món chay', 'Tráng miệng', 'Đồ uống'];

        foreach ($list as $item) {
            DB::table('danh_muc_mon')->insert([
                'ten_danh_muc' => $item,
                'mo_ta' => "Các món thuộc nhóm {$item}",
                'hien_thi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
