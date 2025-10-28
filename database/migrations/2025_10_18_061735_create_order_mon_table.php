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
            $table->foreignId('dat_ban_id')->constrained('dat_ban')->onDelete('cascade');
            $table->foreignId('ban_id')->constrained('ban_an')->onDelete('cascade');
            $table->integer('tong_mon')->nullable();
            $table->decimal('tong_tien', 12, 2)->nullable();
            $table->string('trang_thai')->nullable();
            $table->timestamp('ngay_tao')->nullable();
            $table->timestamp('ngay_cap_nhat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_mon');
    }
};
