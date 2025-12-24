<?php

<<<<<<< HEAD
=======
// database/migrations/2025_10_18_000009_create_order_mon_table.php
>>>>>>> dev
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_mon', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD

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
=======
            $table->unsignedBigInteger('dat_ban_id');
            $table->unsignedBigInteger('ban_id');
            $table->integer('tong_mon')->nullable();
            $table->decimal('tong_tien', 12, 2)->nullable();
            $table->string('trang_thai')->nullable();
            $table->timestamps();

            $table->foreign('dat_ban_id')->references('id')->on('dat_ban')->onDelete('cascade');
            $table->foreign('ban_id')->references('id')->on('ban_an')->onDelete('cascade');
>>>>>>> dev
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_mon');
    }
};
