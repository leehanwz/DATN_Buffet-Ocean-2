<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('nhan_vien')->truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('vi_VN');
        $vaiTros = ['Quản lý', 'Phục vụ', 'Lễ tân', 'Thu ngân'];

        for ($i = 0; $i < 40; $i++) {
            DB::table('nhan_vien')->insert([
                'ho_ten' => $faker->name(),
                'sdt' => '0' . $faker->numerify('9########'),
                'email' => $faker->unique()->safeEmail(),
                'mat_khau' => Hash::make('123456'),
                'vai_tro' => $faker->randomElement($vaiTros),
                'trang_thai' => rand(1, 100) <= 95 ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}