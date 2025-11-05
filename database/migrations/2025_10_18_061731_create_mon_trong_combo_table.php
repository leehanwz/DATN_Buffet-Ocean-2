<?php

// database/migrations/2025_10_18_000007_create_mon_trong_combo_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mon_trong_combo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combo_id');
            $table->unsignedBigInteger('mon_an_id');
            $table->integer('gioi_han_so_luong')->nullable();
            $table->decimal('phu_phi_goi_them', 12, 2)->nullable();
            $table->timestamps();

            $table->foreign('combo_id')->references('id')->on('combo_buffet')->onDelete('cascade');
            $table->foreign('mon_an_id')->references('id')->on('mon_an')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mon_trong_combo');
    }
};
