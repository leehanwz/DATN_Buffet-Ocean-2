<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonAnSeeder extends Seeder
{
    public function run(): void
    {
        $monAn = [
            // --- Khai vị ---
            ['ten_mon' => 'Gỏi cuốn tôm thịt', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Chả giò rế', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Nem chua rán', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Gỏi bò bóp thấu', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Súp hải sản', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Súp bí đỏ kem tươi', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Salad cá ngừ', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Gỏi ngó sen tôm thịt', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Chả cá chiên giòn', 'loai_mon' => 'Khai vị'],
            ['ten_mon' => 'Khoai tây chiên bơ tỏi', 'loai_mon' => 'Khai vị'],

            // --- Món chính ---
            ['ten_mon' => 'Cơm chiên dương châu', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Bò lúc lắc khoai tây', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Cá kho tộ', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Sườn non rim mặn ngọt', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Gà hấp hành', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Lẩu thái hải sản', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Lẩu bò sa tế', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Cá chẽm hấp xì dầu', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Thịt ba chỉ quay giòn bì', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Tôm sú nướng muối ớt', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Vịt quay Bắc Kinh', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Gà nướng mật ong', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Bún chả Hà Nội', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Phở bò tái nạm', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Mì xào hải sản', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Hủ tiếu Nam Vang', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Bò kho bánh mì', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Cơm tấm sườn bì chả trứng', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Canh chua cá lóc', 'loai_mon' => 'Món chính'],
            ['ten_mon' => 'Cá hồi áp chảo sốt bơ chanh', 'loai_mon' => 'Món chính'],

            // --- Tráng miệng ---
            ['ten_mon' => 'Chè khúc bạch', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Chè ba màu', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Rau câu dừa', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Bánh flan', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Bánh chuối nướng', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Bánh da lợn', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Bánh bò hấp', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Sương sáo sữa tươi', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Kem dừa', 'loai_mon' => 'Tráng miệng'],
            ['ten_mon' => 'Trái cây thập cẩm', 'loai_mon' => 'Tráng miệng'],

            // --- Đồ uống ---
            ['ten_mon' => 'Trà đào cam sả', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Sinh tố bơ', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Nước ép cam', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Nước ép dưa hấu', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Cà phê sữa đá', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Cà phê đen nóng', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Trà sữa trân châu đường đen', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Nước chanh tươi', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Nước mía sầu riêng', 'loai_mon' => 'Đồ uống'],
            ['ten_mon' => 'Soda việt quất', 'loai_mon' => 'Đồ uống'],
        ];

        foreach ($monAn as $mon) {
            DB::table('mon_an')->insert([
'danh_muc_id' => DB::table('danh_muc_mon')->inRandomOrder()->value('id'),
                'ten_mon' => $mon['ten_mon'],
                'gia' => rand(20000, 300000),
                'mo_ta' => 'Món ' . strtolower($mon['loai_mon']) . ' hấp dẫn, được chế biến từ nguyên liệu tươi ngon.',
                'hinh_anh' => 'mon_an/' . str_replace(' ', '_', strtolower($mon['ten_mon'])) . '.jpg',
                'trang_thai' => collect(['con', 'het', 'an'])->random(),
                'thoi_gian_che_bien' => rand(5, 30),
                'loai_mon' => $mon['loai_mon'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
