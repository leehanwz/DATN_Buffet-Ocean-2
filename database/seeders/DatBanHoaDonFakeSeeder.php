<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatBanHoaDonFakeSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $faker = \Faker\Factory::create('vi_VN');

        // Giả sử bạn đã có sẵn combo_buffet với id = 1 -> 4
        $comboIds = [1, 2, 3, 4];
        $banIds = range(1, 10); // giả sử có 10 bàn ăn

        for ($i = 1; $i <= 20; $i++) {
            $comboId = $faker->randomElement($comboIds);
            $banId = $faker->randomElement($banIds);
            $soKhach = $faker->numberBetween(2, 10);
            $gioDen = Carbon::now()->subDays(rand(0, 10))->setTime(rand(9, 21), rand(0, 59));
            $trangThai = $faker->randomElement(['cho_xac_nhan','da_xac_nhan','khach_da_den','hoan_tat','huy']);

            $datBanId = DB::table('dat_ban')->insertGetId([
                'ma_dat_ban' => 'DB' . strtoupper(Str::random(5)),
                'ten_khach' => $faker->name(),
                'sdt_khach' => '09' . rand(10000000, 99999999),
                'so_khach' => $soKhach,
                'ban_id' => $banId,
                'combo_id' => $comboId,
                'gio_den' => $gioDen,
                'thoi_luong_phut' => $faker->randomElement([60, 90, 120, 150]),
                'tien_coc' => $faker->numberBetween(100000, 500000),
                'trang_thai' => $trangThai,
                'la_dat_online' => $faker->boolean(),
                'ghi_chu' => $faker->sentence(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // Tạo hóa đơn tương ứng
            $tongTien = match ($comboId) {
                1 => $faker->numberBetween(4000000, 6000000),
                2 => $faker->numberBetween(3500000, 5000000),
                3 => $faker->numberBetween(3000000, 4500000),
                4 => $faker->numberBetween(6000000, 8000000),
                default => $faker->numberBetween(3000000, 7000000),
            };

            DB::table('hoa_don')->insert([
                'dat_ban_id' => $datBanId,
                'tong_tien' => $tongTien,
                'tien_giam' => 0,
                'phu_thu' => 0,
                'da_thanh_toan' => $tongTien,
                'phuong_thuc_tt' => $faker->randomElement(['Tiền mặt', 'Chuyển khoản']),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        echo "✅ Đã fake xong 20 bản ghi dat_ban và hoa_don!\n";
    }
}
