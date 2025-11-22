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
    Schema::table('dat_ban', function (Blueprint $table) {
        $table->dateTime('gio_xac_nhan')->nullable()->after('trang_thai')->comment('Thời điểm bắt đầu tính countdown');
    });
}

public function down(): void
{
    Schema::table('dat_ban', function (Blueprint $table) {
        $table->dropColumn('gio_xac_nhan');
    });
}
};
