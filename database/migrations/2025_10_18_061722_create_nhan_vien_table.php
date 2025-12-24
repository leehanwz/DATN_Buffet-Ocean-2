<?php

<<<<<<< HEAD
=======
// database/migrations/2025_10_18_000001_create_nhan_vien_table.php
>>>>>>> dev
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('sdt');
<<<<<<< HEAD
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('vai_tro');
            // 1 = đang làm, 0 = nghỉ
            $table->boolean('trang_thai')->default(1)->comment('1: đang làm, 0: nghỉ');
            $table->timestamps();
=======
            $table->string('email');
            $table->string('mat_khau');
            $table->string('vai_tro');
            $table->string('trang_thai');
            $table->timestamps(); // created_at, updated_at
>>>>>>> dev
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};
