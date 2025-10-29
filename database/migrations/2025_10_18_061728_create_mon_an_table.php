<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mon_an', function (Blueprint $table) {
            $table->id();

            // <-- SỬA ĐỔI: Dùng cú pháp foreignId() hiện đại và ngắn gọn
            $table->foreignId('danh_muc_id')
                  ->constrained('danh_muc_mon')
                  ->cascadeOnDelete();

            $table->string('ten_mon');
            $table->decimal('gia', 12, 2);
            $table->text('mo_ta')->nullable();
            $table->string('hinh_anh')->nullable();

            $table->enum('trang_thai', [
                'con',  // Còn món
                'het',  // Hết món
                'an'    // Ẩn khỏi menu
            ])->default('con')->comment('Trạng thái kinh doanh của món ăn');

            $table->integer('thoi_gian_che_bien')->nullable();

            $table->enum('loai_mon', [
                'Khai vị',
                'Món chính',
                'Tráng miệng',
                'Đồ uống'
            ])->nullable()->comment('Phân loại món theo lượt ăn (course)');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mon_an');
    }
};
