<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('combo_buffet', function (Blueprint $table) {
            $table->id();
            $table->string('ten_combo');

            $table->enum('loai_combo', [
                'nguoi_lon',
                'tre_em',
                'vip',
                'khuyen_mai'
            ])->nullable()->comment('Loại combo theo đối tượng khách');

            $table->decimal('gia_co_ban', 12, 2);
            $table->integer('thoi_luong_phut')->nullable();
            $table->dateTime('thoi_gian_bat_dau')->nullable();
            $table->dateTime('thoi_gian_ket_thuc')->nullable();

            // 🖼️ Cột ảnh combo
            $table->string('anh')->nullable()->comment('Đường dẫn ảnh combo buffet');

            $table->enum('trang_thai', [
                'dang_ban',
                'ngung_ban'
            ])->default('dang_ban')->comment('Trạng thái kinh doanh (Đang bán / Ngừng bán)');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combo_buffet');
    }
};
