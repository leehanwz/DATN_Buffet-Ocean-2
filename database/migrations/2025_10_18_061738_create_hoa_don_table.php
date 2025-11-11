<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();

            $table->string('ma_hoa_don')->unique(); // thêm mã hóa đơn

            $table->unsignedBigInteger('dat_ban_id');
            $table->decimal('tong_tien', 12, 2)->nullable();
            $table->decimal('tien_giam', 12, 2)->nullable();
            $table->decimal('phu_thu', 12, 2)->nullable();
            $table->decimal('da_thanh_toan', 12, 2)->nullable();
            $table->string('phuong_thuc_tt')->nullable();
            $table->timestamps();

            $table->foreign('dat_ban_id')
                  ->references('id')
                  ->on('dat_ban')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hoa_don');
    }
};
