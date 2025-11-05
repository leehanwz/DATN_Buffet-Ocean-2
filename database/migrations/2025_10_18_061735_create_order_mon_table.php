<?php

// database/migrations/2025_10_18_000009_create_order_mon_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_mon', function (Blueprint $table) {
            $table->id();

            // <-- SỬA ĐỔI: Dùng cú pháp foreignId() ngắn gọn
            $table->foreignId('dat_ban_id')
                  ->constrained('dat_ban')
                  ->cascadeOnDelete();
            
            $table->foreignId('ban_id')
                  ->constrained('ban_an')
                  ->cascadeOnDelete();

            $table->integer('tong_mon')->nullable();
            $table->decimal('tong_tien', 12, 2)->nullable();

            // <-- SỬA ĐỔI: Đổi string sang enum để khớp với thiết kế DBML
            $table->enum('trang_thai', [
                'cho_bep',        // Chờ bếp nhận
                'dang_che_bien',  // Đang chế biến
                'da_len_mon',     // Đã lên món
                'huy_mon'         // Hủy món
            ])->default('cho_bep')->comment('Trạng thái tổng của phiếu order');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_mon');
    }
};