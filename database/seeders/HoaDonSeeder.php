<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HoaDonSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $datBanIds = DB::table('dat_ban')->pluck('id')->toArray();

        $year = now()->year;
        $monthNow = now()->month;
        $dayNow = now()->day;

        for ($month = 1; $month <= $monthNow; $month++) {
            // Nếu là tháng hiện tại → chỉ tạo đến ngày hôm nay
            $maxDay = ($month == $monthNow) ? $dayNow : 28;

            for ($i = 0; $i < 20; $i++) {
                $ngayTao = Carbon::create($year, $month, rand(1, $maxDay));

                DB::table('hoa_don')->insert([
                    'dat_ban_id' => $datBanIds[array_rand($datBanIds)],
                    'tong_tien' => rand(800, 1500) * 1000,
                    'da_thanh_toan' => rand(0, 1) ? 1000000 : 0,
                    'phuong_thuc_tt' => $faker->randomElement(['Tiền mặt', 'Chuyển khoản']),
                    'created_at' => $ngayTao,
                    'updated_at' => now(),
                ]);
            }
        }
    }
}