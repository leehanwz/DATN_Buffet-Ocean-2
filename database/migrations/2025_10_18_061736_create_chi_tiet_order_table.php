<?php

// database/migrations/2025_10_18_000010_create_chi_tiet_order_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chi_tiet_order', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD

            // <-- SỬA ĐỔI: Dùng cú pháp foreignId() ngắn gọn
            $table->foreignId('order_id')
                  ->constrained('order_mon')
                  ->cascadeOnDelete();
            
            $table->foreignId('mon_an_id')
                  ->constrained('mon_an')
                  ->cascadeOnDelete();

            $table->integer('so_luong')->nullable();

            // <-- SỬA ĐỔI: Đổi string sang enum để khớp với thiết kế DBML
            $table->enum('loai_mon', [
                'combo',    // Món thuộc combo
                'goi_them'  // Món gọi thêm (tính tiền riêng)
            ])->nullable()->comment('Phân loại món trong order');

            // <-- SỬA ĐỔI: Đổi string sang enum (giống bảng order_mon)
            $table->enum('trang_thai', [
                'cho_bep',
                'dang_che_bien',
                'da_len_mon',
                'huy_mon'
            ])->default('cho_bep')->comment('Trạng thái chi tiết của từng món');
            
            $table->string('ghi_chu')->nullable();
            $table->timestamps();

=======
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('mon_an_id');
            $table->integer('so_luong')->nullable();
            $table->string('loai_mon')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('order_mon')->onDelete('cascade');
            $table->foreign('mon_an_id')->references('id')->on('mon_an')->onDelete('cascade');
>>>>>>> dev
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_order');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> dev
