<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('khu_vuc', function (Blueprint $table) {
            $table->boolean('trang_thai')->default(1)->comment('1: hoạt động, 0: tạm ngưng');
        });
    }

    public function down(): void
    {
        Schema::table('khu_vuc', function (Blueprint $table) {
            $table->dropColumn('trang_thai');
        });
    }
};
