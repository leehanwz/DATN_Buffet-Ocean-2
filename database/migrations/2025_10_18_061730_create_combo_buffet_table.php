<?php

// database/migrations/2025_10_18_000006_create_combo_buffet_table.php
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
            $table->string('loai_combo')->nullable();
            $table->decimal('gia_co_ban', 12, 2);
            $table->integer('thoi_luong_phut')->nullable();
            $table->dateTime('thoi_gian_bat_dau')->nullable();
            $table->dateTime('thoi_gian_ket_thuc')->nullable();
            $table->string('trang_thai')->nullable();
            $table->timestamp('ngay_tao')->nullable();
            $table->timestamp('ngay_cap_nhat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combo_buffet');
    }
};
