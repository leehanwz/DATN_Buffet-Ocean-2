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
                'ban_id' => $banIds[array_rand($banIds)],
                'trang_thai' => ['cho_bep', 'dang_che_bien', 'da_len_mon', 'huy_mon'][rand(0, 3)],
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}