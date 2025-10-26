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
        Schema::table('mon_trong_combo', function (Blueprint $table) {
            // Thêm cột mới
            $table->tinyInteger('trang_thai')->default(1)->comment('1: active, 0: inactive');

            // Thêm unique constraint để tránh trùng món trong combo
            $table->unique(['combo_id', 'mon_an_id'], 'uq_combo_mon');
        });
    }

    public function down(): void
    {
        Schema::table('mon_trong_combo', function (Blueprint $table) {
            $table->dropUnique('uq_combo_mon');
            $table->dropColumn(['trang_thai']);
        });
    }
};
