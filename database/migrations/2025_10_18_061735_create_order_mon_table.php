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
            $table->unsignedBigInteger('dat_ban_id');
            $table->unsignedBigInteger('ban_id');
            $table->integer('tong_mon')->nullable();
            $table->decimal('tong_tien', 12, 2)->nullable();
            $table->string('trang_thai')->nullable();
            $table->timestamps();

            $table->foreign('dat_ban_id')->references('id')->on('dat_ban')->onDelete('cascade');
            $table->foreign('ban_id')->references('id')->on('ban_an')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_mon');
    }
};
