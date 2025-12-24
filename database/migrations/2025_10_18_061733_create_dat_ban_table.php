<?php

// database/migrations/2025_10_18_000008_create_dat_ban_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dat_ban', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('ma_dat_ban')->nullable()->unique(); // Mã nên là duy nhất
            $table->string('ten_khach');
            $table->string('sdt_khach');
            $table->integer('so_khach');

            // <-- SỬA ĐỔI: Dùng cú pháp foreignId() ngắn gọn
            $table->foreignId('ban_id')
                  ->constrained('ban_an')
                  ->cascadeOnDelete();
            
            $table->foreignId('combo_id')
                  ->nullable()
                  ->constrained('combo_buffet')
                  ->nullOnDelete(); // Tương đương onDelete('set null')

            $table->foreignId('nhan_vien_id')
                  ->nullable()
                  ->constrained('nhan_vien')
                  ->nullOnDelete(); // Tương đương onDelete('set null')

            $table->dateTime('gio_den')->nullable();
            $table->integer('thoi_luong_phut')->nullable();
            $table->decimal('tien_coc', 12, 2)->nullable();

            // <-- SỬA ĐỔI: Đổi string sang enum để khớp với thiết kế DBML
            $table->enum('trang_thai', [
                'cho_xac_nhan',
                'da_xac_nhan',
                'khach_da_den',
                'hoan_tat',
                'huy'
            ])->default('cho_xac_nhan')->comment('Trạng thái của việc đặt bàn');

=======
            $table->string('ma_dat_ban')->nullable();
            $table->string('ten_khach');
            $table->string('sdt_khach');
            $table->integer('so_khach');
            $table->unsignedBigInteger('ban_id');
            $table->unsignedBigInteger('combo_id')->nullable();
            $table->unsignedBigInteger('nhan_vien_id')->nullable();
            $table->dateTime('gio_den')->nullable();
            $table->integer('thoi_luong_phut')->nullable();
            $table->decimal('tien_coc', 12, 2)->nullable();
            $table->string('trang_thai')->nullable();
>>>>>>> dev
            $table->string('xac_thuc_ma')->nullable();
            $table->boolean('la_dat_online')->default(false);
            $table->text('ghi_chu')->nullable();
            $table->timestamps();

<<<<<<< HEAD
=======
            $table->foreign('ban_id')->references('id')->on('ban_an')->onDelete('cascade');
            $table->foreign('combo_id')->references('id')->on('combo_buffet')->onDelete('set null');
            $table->foreign('nhan_vien_id')->references('id')->on('nhan_vien')->onDelete('set null');
>>>>>>> dev
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dat_ban');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> dev
