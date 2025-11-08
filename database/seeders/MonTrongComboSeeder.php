<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonTrongComboSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy thời gian hiện tại 1 lần
        $now = now();
        // hoặc $now = \Carbon\Carbon::now();

        for ($i = 0; $i < 25; $i++) {
            DB::table('mon_trong_combo')->insert([
                'combo_id' => $faker->numberBetween(1, 5),
                'mon_an_id' => $faker->numberBetween(1, 30),
                'gioi_han_so_luong' => $faker->numberBetween(1, 5),
                'phu_phi_goi_them' => $faker->randomFloat(0, 10000, 30000),

                // === SỬA LỖI: Thêm 2 dòng này ===
                'created_at' => $now,
                'updated_at' => $now,
                // ================================
            ]);
        }
    }
}

        // Giả sử combo_buffet và mon_an đã có dữ liệu
        $comboIds = DB::table('combo_buffet')->pluck('id')->toArray();
        $monAnIds = DB::table('mon_an')->pluck('id')->toArray();

        // Nếu chưa có dữ liệu thì không chạy
        if (empty($comboIds) || empty($monAnIds)) {
            $this->command->warn('⚠️ Bảng combo_buffet hoặc mon_an chưa có dữ liệu.');
            return;
        }

        $data = [];

        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'combo_id' => $comboIds[array_rand($comboIds)],
                'mon_an_id' => $monAnIds[array_rand($monAnIds)],
                'gioi_han_so_luong' => rand(1, 10),
                'phu_phi_goi_them' => rand(0, 1) ? rand(10000, 50000) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mon_trong_combo')->insert($data);
    }
}
