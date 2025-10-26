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
        Schema::table('ban_an', function (Blueprint $table) {
            // Thêm cột thời gian bắt đầu (để tính giờ khách bắt đầu order)
            $table->dateTime('thoi_gian_bat_dau')->nullable()->after('so_ghe')->comment('Thời gian khách bắt đầu sử dụng bàn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ban_an', function (Blueprint $table) {
            $table->dropColumn('thoi_gian_bat_dau');
        });
    }
};
