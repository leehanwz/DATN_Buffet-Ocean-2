<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
    use HasFactory;

    protected $table = 'khu_vuc';

    // Các trường cho phép gán giá trị
    protected $fillable = [
        'ten_khu_vuc',
        'mo_ta',
        'tang'
    ];

    // Tắt timestamps mặc định và định nghĩa lại tên cột của bạn
    public $timestamps = false;
    protected $dates = [
        'ngay_tao',
        'ngay_cap_nhat'
    ];

    // Định nghĩa mối quan hệ: Một Khu vực có nhiều Bàn ăn
    public function banAns()
    {
        // 'banAns' là tên mối quan hệ dùng trong Controller/View
        // 'khu_vuc_id' là khóa ngoại trong bảng ban_an
        return $this->hasMany(BanAn::class, 'khu_vuc_id');
    }
}
