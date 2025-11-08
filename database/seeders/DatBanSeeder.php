<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DatBanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Lấy danh sách id có sẵn để gán ngẫu nhiên
        $banIds = DB::table('ban_an')->pluck('id')->toArray();
        $comboIds = DB::table('combo_buffet')->pluck('id')->toArray();
        $nhanVienIds = DB::table('nhan_vien')->pluck('id')->toArray();

        // Các trạng thái có thể có
        $trangThais = ['cho_xac_nhan', 'da_xac_nhan', 'khach_da_den', 'hoan_tat', 'huy'];

        for ($i = 1; $i <= 80; $i++) {
            $isOnline = $faker->boolean(40); // 40% đặt online

            DB::table('dat_ban')->insert([
                'ma_dat_ban' => 'DB' . now()->format('Ymd') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'ten_khach' => $faker->name(),
                'sdt_khach' => $faker->numerify('09########'),
                'so_khach' => $faker->numberBetween(2, 10),
                'ban_id' => $faker->randomElement($banIds),
                'combo_id' => $faker->optional()->randomElement($comboIds),
                'nhan_vien_id' => $faker->optional()->randomElement($nhanVienIds),
                'gio_den' => $faker->dateTimeBetween('+1 days', '+7 days'),
                'thoi_luong_phut' => $faker->numberBetween(60, 180),
                'tien_coc' => $faker->randomElement([0, 50000, 100000, 200000]),
                'trang_thai' => $faker->randomElement($trangThais),
                'xac_thuc_ma' => $isOnline ? $faker->numerify('######') : null,
                'la_dat_online' => $isOnline,
                'ghi_chu' => $faker->optional()->sentence(6),
                'created_at' => now()->subDays(rand(0, 10)),
                'updated_at' => now(),
            ]);
        }
    }
}
