<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('nhan_vien')->insert([
                'ho_ten' => $faker->name(),
                'sdt' => $faker->phoneNumber(),
                'email' => $faker->unique()->safeEmail(),
                'mat_khau' => bcrypt('123456'),
                'vai_tro' => $faker->randomElement(['admin', 'nhan_vien']),
                'trang_thai' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}