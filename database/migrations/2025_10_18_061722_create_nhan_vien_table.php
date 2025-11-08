<?php

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
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('vai_tro');
            // 1 = đang làm, 0 = nghỉ
            $table->boolean('trang_thai')->default(1)->comment('1: đang làm, 0: nghỉ');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};
