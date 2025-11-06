<?php

use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tạo bảng mới để lưu nhiều ảnh cho một món ăn
        Schema::create('thu_vien_anh_mon_an', function (Blueprint $table) {
            $table->id();

            // Tạo khóa ngoại liên kết với bảng 'mon_an'
            // cascadeOnDelete() sẽ tự động xóa ảnh khi món ăn bị xóa
            $table->foreignId('mon_an_id')
                  ->constrained('mon_an')
                  ->cascadeOnDelete();

            $table->string('duong_dan_anh'); // Cột lưu đường dẫn ảnh
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thu_vien_anh_mon_an');
    }
};