<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
    use HasFactory;

    protected $table = 'khu_vuc';

    // Giữ đúng các cột đang có trong CSDL
    protected $fillable = [
        'ten_khu_vuc',
        'mo_ta',
        'tang',          // có trong database gốc
        'trang_thai'     // bạn thêm cũng được, nếu có trạng thái kích hoạt/tạm ngưng
    ];

    public function banAn()
    {
        return $this->hasMany(BanAn::class, 'khu_vuc_id');
    }
}
