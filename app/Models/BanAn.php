<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanAn extends Model
{
    use HasFactory;

    protected $table = 'ban_an';

    protected $fillable = [
        'khu_vuc_id',
        'so_ban',
        'ma_qr',         // mã QR (ví dụ: BAN001)
        'duong_dan_qr',  // đường dẫn file ảnh QR (public/uploads/qr/...)
        'so_ghe',        // số ghế của bàn
        'trang_thai'     // 'trống' | 'đã đặt' | ...
    ];

    public function khuVuc()
    {
        return $this->belongsTo(KhuVuc::class, 'khu_vuc_id');
    }
}
