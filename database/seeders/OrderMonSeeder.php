<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\DatBan;
use App\Models\BanAn;

class OrderMonSeeder extends Seeder
{
    public function run(): void
    {
        $datBanIds = DatBan::pluck('id')->toArray();
        $banIds = BanAn::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('order_mon')->insert([
                'dat_ban_id' => $datBanIds[array_rand($datBanIds)],
                'ban_id' => $banIds[array_rand($banIds)], // ✅ dùng ID có thật
                'trang_thai' => ['Đang xử lý', 'Hoàn tất', 'Hủy'][rand(0, 2)],
                'ngay_tao' => now()->subDays(rand(0, 30)),
                'ngay_cap_nhat' => now(),
            ]);
        }
    }
}