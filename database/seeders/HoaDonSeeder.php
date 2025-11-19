<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SỬA 1: Tự động xoá các hoá đơn seeder cũ (có tiền tố 'HDSEED')
        DB::table('hoa_don')->where('ma_hoa_don', 'LIKE', 'HDSEED%')->delete();

        // Danh sách các dat_ban_id CHƯA được dùng
        $datBanIds = [
            2, 4, 5, 7, 9, 10, 12, 13, 14, 17, 
            18, 19, 20, 22, 24, 25, 28, 34, 35, 36, 
            38, 40, 41, 43, 44, 45, 46, 47, 48, 49
        ];
        
        $phuongThucTT = ['Tiền mặt', 'Chuyển khoản ngân hàng', 'Thẻ Visa/Mastercard', 'Ví điện tử Momo'];
        $voucherPool = [1, 2, 3, 4, 5, 6]; 
        $hoaDonData = [];
        $now = Carbon::now(); // Thời điểm hiện tại

        foreach ($datBanIds as $index => $datBanId) {
            
            // SỬA 2: Dùng ->copy() để không làm thay đổi biến $now
            // Tạo ngày ngẫu nhiên trong 365 ngày qua
            $created_at_time = $now->copy()->subDays(rand(0, 365))->subHours(rand(1, 24));
            // Thời gian update_at sẽ sau created_at
            $updated_at_time = $created_at_time->copy()->addMinutes(rand(10, 120)); 

            $tongTien = rand(500000, 5000000);
            $phuThu = rand(0, 3) == 1 ? rand(1, 5) * 10000 : 0.00; // 25% có phụ thu
            
            $voucherId = null;
            $tienGiam = 0.00;

            if (rand(1, 3) == 1) { // 1/3 cơ hội dùng voucher
                $voucherId = $voucherPool[array_rand($voucherPool)];
                
                if ($voucherId == 1 || $voucherId == 3 || $voucherId == 6) { // Giảm %
                    $tienGiam = $tongTien * (rand(10, 30) / 100);
                    if ($tienGiam > 100000) $tienGiam = 100000;
                } else { // Giảm tiền mặt
                    $tienGiam = rand(5, 10) * 10000;
                }
            }

            $daThanhToan = $tongTien - $tienGiam + $phuThu;
            if ($daThanhToan < 0) $daThanhToan = 0; // Đảm bảo không âm

            $hoaDonData[] = [
                // SỬA 3: Dùng tiền tố HDSEED để an toàn và nhất quán
                'ma_hoa_don' => sprintf('HDSEED%s%03d', $created_at_time->format('Ymd'), $index + 1),
                'dat_ban_id' => $datBanId,
                'voucher_id' => $voucherId,
                'tong_tien' => $tongTien,
                'tien_giam' => $tienGiam,
                'phu_thu' => $phuThu,
                'da_thanh_toan' => $daThanhToan,
                'phuong_thuc_tt' => $phuongThucTT[array_rand($phuongThucTT)],
                'created_at' => $created_at_time, // Dùng ngày đã tạo
                'updated_at' => $updated_at_time, // Dùng ngày đã cập nhật
            ];
        }

        DB::table('hoa_don')->insert($hoaDonData);
    }
}