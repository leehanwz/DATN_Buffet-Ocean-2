<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatBanHoaDonSeeder extends Seeder
{
    public function run()
    {
        // 🚫 Tạm tắt kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('hoa_don')->truncate();
        DB::table('dat_ban')->truncate();

        // ✅ Bật lại khóa ngoại sau khi truncate xong
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $comboIds = DB::table('combo_buffet')->pluck('id')->toArray();
        $banIds = range(1, 10);
        $trangThai = ['cho_xac_nhan', 'da_xac_nhan', 'khach_da_den', 'hoan_tat', 'huy'];

        for ($i = 1; $i <= 20; $i++) {

            $datBanId = DB::table('dat_ban')->insertGetId([
                'ma_dat_ban' => 'DB' . strtoupper(Str::random(5)),
                'ten_khach' => fake()->name(),
                'sdt_khach' => '09' . rand(10000000, 99999999),
                'so_khach' => rand(2, 10),
                'ban_id' => fake()->randomElement($banIds),
                'combo_id' => fake()->randomElement($comboIds),
                'gio_den' => Carbon::now()->subDays(rand(0, 30))->setTime(rand(9, 21), rand(0, 59)),
                'thoi_luong_phut' => rand(60, 180),
                'tien_coc' => rand(100000, 500000),
                'trang_thai' => fake()->randomElement($trangThai),
                'xac_thuc_ma' => strtoupper(Str::random(6)),
                'la_dat_online' => rand(0, 1),
                'ghi_chu' => fake()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $tong = rand(1000000, 8000000);
            $giam = rand(0, 200000);
            $phuThu = rand(0, 100000);

            DB::table('hoa_don')->insert([
                'dat_ban_id' => $datBanId,
                'tong_tien' => $tong,
                'tien_giam' => $giam,
                'phu_thu' => $phuThu,
                'da_thanh_toan' => $tong - $giam + $phuThu,
                'phuong_thuc_tt' => fake()->randomElement(['Tiền mặt', 'Chuyển khoản', 'Ví điện tử']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "✅ Đã fake xong 20 đơn đặt bàn và hóa đơn!\n";
    }
}
