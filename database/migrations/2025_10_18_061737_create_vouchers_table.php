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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('ma_voucher')->unique();
            $table->enum('loai_giam', ['phan_tram', 'tien_mat']);
            $table->decimal('gia_tri', 12, 2);
            $table->decimal('gia_tri_toi_da', 12, 2)->nullable()->comment('Giới hạn khi giảm %');
            $table->text('mo_ta')->nullable();

            $table->integer('so_luong')->default(0);
            $table->integer('so_luong_da_dung')->default(0);

            $table->dateTime('ngay_bat_dau')->nullable();
            $table->dateTime('ngay_ket_thuc')->nullable();

            $table->enum('trang_thai', ['dang_ap_dung', 'ngung_ap_dung'])->default('dang_ap_dung');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
