<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        $vaiTros = ['Lễ tân', 'Quản lý', 'Phục vụ', 'Thu ngân'];

        $nhanViens = [
            [
                'ho_ten' => 'Nguyễn Văn An',
                'sdt' => '0901002001',
                'email' => 'an.nguyen@example.com',
                'mat_khau' => Hash::make('123456'),
                'vai_tro' => 'Quản lý',
                'trang_thai' => 1, // đang làm
            ],
            [
                'ho_ten' => 'Trần Thị Bình',
                'sdt' => '0902003002',
                'email' => 'binh.tran@example.com',
                'mat_khau' => Hash::make('123456'),
                'vai_tro' => 'Lễ tân',
                'trang_thai' => 1,
            ],
            [
                'ho_ten' => 'Lê Hoàng Nam',
                'sdt' => '0903004003',
                'email' => 'nam.le@example.com',
                'mat_khau' => Hash::make('123456'),
                'vai_tro' => 'Phục vụ',
                'trang_thai' => 1,
            ],
            [
                'ho_ten' => 'Phạm Thị Lan',
                'sdt' => '0904005004',
                'email' => 'lan.pham@example.com',
                'mat_khau' => Hash::make('123456'),
                'vai_tro' => 'Thu ngân',
                'trang_thai' => 1,
            ],
        ];

        // Thêm vài nhân viên ngẫu nhiên bằng Faker
        for ($i = 0; $i < 3; $i++) {
            $nhanViens[] = [
                'ho_ten' => $faker->name(),
                'sdt' => $faker->numerify('09########'),
                'email' => $faker->unique()->safeEmail(),
                'mat_khau' => Hash::make('123456'),
                'vai_tro' => $faker->randomElement($vaiTros),
                'trang_thai' => $faker->boolean(), // 1 hoặc 0 ngẫu nhiên
            ];
        }

        DB::table('nhan_vien')->insert($nhanViens);
    }
}
