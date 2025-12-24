<?php

<<<<<<< HEAD
=======
// database/migrations/2025_10_18_000011_create_hoa_don_table.php
>>>>>>> dev
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD

            $table->string('ma_hoa_don')->unique(); // thêm mã hóa đơn

            $table->unsignedBigInteger('dat_ban_id');

            // Thêm voucher vào hóa đơn
            $table->unsignedBigInteger('voucher_id')->nullable(); // bỏ ->after()

=======
            $table->unsignedBigInteger('dat_ban_id');
>>>>>>> dev
            $table->decimal('tong_tien', 12, 2)->nullable();
            $table->decimal('tien_giam', 12, 2)->nullable();
            $table->decimal('phu_thu', 12, 2)->nullable();
            $table->decimal('da_thanh_toan', 12, 2)->nullable();
            $table->string('phuong_thuc_tt')->nullable();
            $table->timestamps();

<<<<<<< HEAD
            // Khóa ngoại đặt bàn
            $table->foreign('dat_ban_id')
                  ->references('id')
                  ->on('dat_ban')
                  ->onDelete('cascade');

            // Khóa ngoại voucher
            $table->foreign('voucher_id')
                  ->references('id')
                  ->on('vouchers')
                  ->onDelete('set null'); // nếu voucher bị xóa thì để NULL
=======
            $table->foreign('dat_ban_id')->references('id')->on('dat_ban')->onDelete('cascade');
>>>>>>> dev
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hoa_don');
    }
};
