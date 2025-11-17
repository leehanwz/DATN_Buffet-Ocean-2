<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_mon', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dat_ban_id')
                  ->constrained('dat_ban')
                  ->cascadeOnDelete();

            $table->foreignId('ban_id')
                  ->constrained('ban_an')
                  ->cascadeOnDelete();

            $table->integer('tong_mon')->nullable();
            $table->decimal('tong_tien', 12, 2)->nullable();

            // ✅ Giữ lại 2 trạng thái chính
            $table->enum('trang_thai', [
                'dang_xu_li',  // Đang xử lý (chưa xong)
                'hoan_thanh'   // Hoàn thành
            ])->default('dang_xu_li')->comment('Trạng thái tổng của phiếu order');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_mon');
    }
};
