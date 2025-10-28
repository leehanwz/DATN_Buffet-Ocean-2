<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KhuVucSeeder::class,
            BanAnSeeder::class,
            DanhMucMonSeeder::class,
            MonAnSeeder::class,
            ComboBuffetSeeder::class,
            MonTrongComboSeeder::class,
            DatBanSeeder::class,
            HoaDonSeeder::class,
            OrderMonSeeder::class,
            ChiTietOrderSeeder::class,
            NhanVienSeeder::class,
        ]);
    }
}
