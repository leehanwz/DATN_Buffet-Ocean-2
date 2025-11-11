<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HoaDon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HoaDonSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('vi_VN');

        // Danh sách DatBan hợp lệ
        $datBanIds = DB::table('dat_ban')
            ->whereIn('trang_thai', ['hoan_tat', 'khach_da_den'])
            ->pluck('id')
            ->toArray();

        if (empty($datBanIds)) {
            $this->command->warn('Không có đủ DatBan ID (hoan_tat/khach_da_den) để tạo HoaDon.');
            return;
        }

        $count = 0;
        foreach ($datBanIds as $datBanId) {
            if ($count >= 20) break;

            // Tạo mã hóa đơn tự động
            $maHoaDon = 'HD' . date('Ymd') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

            $tongTien = $faker->randomFloat(2, 600000, 5000000);
            $tienGiam = $faker->randomFloat(2, 0, $tongTien * 0.15);
            $phuThu = $faker->randomElement([0, 10000.00, 30000.00, 50000.00]);
            $daThanhToan = $tongTien - $tienGiam + $phuThu;
            $phuongThucTT = $faker->randomElement([
                'Tiền mặt',
                'Chuyển khoản ngân hàng',
                'Thẻ Visa/Mastercard',
                'Ví điện tử Momo'
            ]);

            $datBan = DB::table('dat_ban')->find($datBanId);
            $updatedAt = $datBan
                ? date('Y-m-d H:i:s', strtotime($datBan->created_at . ' + ' . $faker->numberBetween(1, 120) . ' minutes'))
                : $faker->dateTimeBetween('-1 month', 'now');

            HoaDon::create([
                'ma_hoa_don' => $maHoaDon,  // ✅ Thêm mã hóa đơn
                'dat_ban_id' => $datBanId,
                'tong_tien' => $tongTien,
                'tien_giam' => $tienGiam,
                'phu_thu' => $phuThu,
                'da_thanh_toan' => $daThanhToan,
                'phuong_thuc_tt' => $phuongThucTT,
                'created_at' => $datBan->created_at ?? $updatedAt,
                'updated_at' => $updatedAt,
            ]);

            $count++;
        }
    }
}
