<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatBanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        // Lấy danh sách id - nếu trống thì để null tránh lỗi FK
        $banIds = DB::table('ban_an')->pluck('id')->toArray();
        $comboIds = DB::table('combo_buffet')->pluck('id')->toArray();
        $nhanVienIds = DB::table('nhan_vien')->pluck('id')->toArray();

        $trangThais = ['cho_xac_nhan', 'da_xac_nhan', 'khach_da_den', 'hoan_tat', 'huy'];

        for ($i = 1; $i <= 80; $i++) {
            $isOnline = $faker->boolean(40); // 40% đặt online

            DB::table('dat_ban')->insert([
                'ma_dat_ban' => 'DB' . now()->format('Ymd') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'ten_khach' => $faker->name(),
                'email_khach'=> $faker->safeEmail(), // <-- THÊM EMAIL
                'sdt_khach' => $faker->numerify('09########'),
                'so_khach' => $faker->numberBetween(2, 10),

                // Nếu không có ID trong bảng -> set null để tránh lỗi FK
                'ban_id' => !empty($banIds) ? $faker->randomElement($banIds) : null,
                'combo_id' => !empty($comboIds) ? $faker->optional()->randomElement($comboIds) : null,
                'nhan_vien_id' => !empty($nhanVienIds) ? $faker->optional()->randomElement($nhanVienIds) : null,

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
