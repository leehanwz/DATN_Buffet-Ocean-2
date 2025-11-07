<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatBanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Giả sử các bảng khóa ngoại đã có dữ liệu
        $banIds = DB::table('ban_an')->pluck('id')->toArray();
        $comboIds = DB::table('combo_buffet')->pluck('id')->toArray();
        $nhanVienIds = DB::table('nhan_vien')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('dat_ban')->insert([
                'ma_dat_ban' => 'DB' . strtoupper(Str::random(6)),
                'ten_khach' => $faker->name(),
                'sdt_khach' => '0' . $faker->numberBetween(100000000, 999999999),
                'so_khach' => $faker->numberBetween(2, 10),

                'ban_id' => $faker->randomElement($banIds),
                'combo_id' => $faker->optional()->randomElement($comboIds),
                'nhan_vien_id' => $faker->optional()->randomElement($nhanVienIds),

                'gio_den' => $faker->dateTimeBetween('now', '+2 days'),
                'thoi_luong_phut' => $faker->randomElement([60, 90, 120]),
                'tien_coc' => $faker->randomFloat(2, 100000, 500000),

                'trang_thai' => $faker->randomElement([
                    'cho_xac_nhan',
                    'da_xac_nhan',
                    'khach_da_den',
                    'hoan_tat',
                    'huy'
                ]),

                'xac_thuc_ma' => strtoupper(Str::random(8)),
                'la_dat_online' => $faker->boolean(40), // 40% là đặt online
                'ghi_chu' => $faker->optional()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
