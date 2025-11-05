<?php

// database/migrations/2025_10_18_000004_create_danh_muc_mon_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('danh_muc_mon', function (Blueprint $table) {
            $table->id();
            $table->string('ten_danh_muc');
            $table->text('mo_ta')->nullable();
            $table->boolean('hien_thi')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('danh_muc_mon');
    }
};
