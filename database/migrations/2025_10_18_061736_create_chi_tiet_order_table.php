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
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('mon_an_id');
            $table->integer('so_luong')->nullable();
            $table->string('loai_mon')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('order_mon')->onDelete('cascade');
            $table->foreign('mon_an_id')->references('id')->on('mon_an')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_order');
    }
};
