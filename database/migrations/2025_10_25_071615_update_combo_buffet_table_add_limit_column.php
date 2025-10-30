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
        Schema::table('combo_buffet', function (Blueprint $table) {
            $table->integer('gioi_han_mon')->nullable()->after('thoi_gian_ket_thuc')
                ->comment('Số lượng món tối đa trong combo');
        });
    }

    public function down(): void
    {
        Schema::table('combo_buffet', function (Blueprint $table) {
            $table->dropColumn('gioi_han_mon');
        });
    }
};
