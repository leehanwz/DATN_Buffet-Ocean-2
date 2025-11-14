<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vouchers')->insert([
            [
                'ma_voucher' => 'SALE20',
                'loai_giam' => 'phan_tram',
                'gia_tri' => 20,
                'gia_tri_toi_da' => 100000,
                'mo_ta' => 'Giảm 20% tối đa 100.000đ',
                'so_luong' => 50,
                'so_luong_da_dung' => 0,
                'ngay_bat_dau' => now(),
                'ngay_ket_thuc' => now()->addDays(30),
                'trang_thai' => 'dang_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'ma_voucher' => 'BUFFET50',
                'loai_giam' => 'tien_mat',
                'gia_tri' => 50000,
                'gia_tri_toi_da' => null,
                'mo_ta' => 'Giảm trực tiếp 50.000đ',
                'so_luong' => 100,
                'so_luong_da_dung' => 10,
                'ngay_bat_dau' => now(),
                'ngay_ket_thuc' => now()->addDays(60),
                'trang_thai' => 'dang_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'ma_voucher' => 'VIP10',
                'loai_giam' => 'phan_tram',
                'gia_tri' => 10,
                'gia_tri_toi_da' => 50000,
                'mo_ta' => 'Giảm 10% tối đa 50.000đ cho khách VIP',
                'so_luong' => 20,
                'so_luong_da_dung' => 5,
                'ngay_bat_dau' => now()->subDays(2),
                'ngay_ket_thuc' => now()->addDays(15),
                'trang_thai' => 'dang_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'ma_voucher' => 'TET2025',
                'loai_giam' => 'tien_mat',
                'gia_tri' => 100000,
                'gia_tri_toi_da' => null,
                'mo_ta' => 'Giảm 100.000đ mừng Tết 2025',
                'so_luong' => 500,
                'so_luong_da_dung' => 120,
                'ngay_bat_dau' => '2025-01-01 00:00:00',
                'ngay_ket_thuc' => '2025-02-01 23:59:59',
                'trang_thai' => 'dang_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'ma_voucher' => 'KIDFREE',
                'loai_giam' => 'tien_mat',
                'gia_tri' => 70000,
                'gia_tri_toi_da' => null,
                'mo_ta' => 'Ưu đãi giảm 70.000đ cho trẻ em',
                'so_luong' => 70,
                'so_luong_da_dung' => 7,
                'ngay_bat_dau' => now(),
                'ngay_ket_thuc' => now()->addDays(45),
                'trang_thai' => 'dang_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'ma_voucher' => 'FLASH30',
                'loai_giam' => 'phan_tram',
                'gia_tri' => 30,
                'gia_tri_toi_da' => 50000,
                'mo_ta' => 'Flash sale: Giảm 30% tối đa 50k',
                'so_luong' => 200,
                'so_luong_da_dung' => 30,
                'ngay_bat_dau' => now(),
                'ngay_ket_thuc' => now()->addDays(7),
                'trang_thai' => 'dang_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'ma_voucher' => 'STOPSALE',
                'loai_giam' => 'tien_mat',
                'gia_tri' => 30000,
                'gia_tri_toi_da' => null,
                'mo_ta' => 'Voucher thử nghiệm (đã ngừng áp dụng)',
                'so_luong' => 100,
                'so_luong_da_dung' => 100,
                'ngay_bat_dau' => now()->subDays(10),
                'ngay_ket_thuc' => now()->subDays(1),
                'trang_thai' => 'ngung_ap_dung',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
