<?php

// database/migrations/2025_10_18_000003_create_ban_an_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ban_an', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khu_vuc_id');
            $table->string('so_ban');
            $table->string('ma_qr')->nullable();
            $table->string('duong_dan_qr')->nullable();
            $table->integer('so_ghe');
            $table->enum('trang_thai', ['trong', 'dang_phuc_vu', 'da_dat', 'khong_su_dung'])->default('trong');
            $table->timestamps();

            $table->foreign('khu_vuc_id')
                ->references('id')
                ->on('khu_vuc')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ban_an');
    }
};
