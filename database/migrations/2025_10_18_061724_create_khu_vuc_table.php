<?php

// database/migrations/2025_10_18_000002_create_khu_vuc_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('khu_vuc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khu_vuc');
            $table->string('mo_ta');
            $table->integer('tang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khu_vuc');
    }
};
