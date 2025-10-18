<?php

// database/migrations/2025_10_18_000005_create_mon_an_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mon_an', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('danh_muc_id');
            $table->string('ten_mon');
            $table->decimal('gia', 12, 2);
            $table->text('mo_ta')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('trang_thai');
            $table->integer('thoi_gian_che_bien')->nullable();
            $table->string('loai_mon')->nullable();
            $table->timestamps();

            $table->foreign('danh_muc_id')->references('id')->on('danh_muc_mon')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mon_an');
    }
};
