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
        Schema::table('chi_tiet_order', function (Blueprint $table) {
            $table->decimal('don_gia', 12, 2)->default(0)->after('so_luong')->comment('Đơn giá món tại thời điểm order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_order', function (Blueprint $table) {
            $table->dropColumn('don_gia');
        });
    }
};
