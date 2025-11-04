<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietOrder extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_order'; // Tên bảng trong DB

    protected $fillable = [
        'order_id',
        'mon_an_id',
        'so_luong',
        'loai_mon',
        'trang_thai',
        'ghi_chu',
        'ngay_tao',
        'ngay_cap_nhat',
    ];

    public $timestamps = false; // Vì bạn dùng 'ngay_tao' và 'ngay_cap_nhat' thay vì 'created_at' và 'updated_at'

    // Quan hệ với món ăn
    public function mon()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }

    // Quan hệ với đơn hàng (nếu có model OrderMon)
    public function order()
    {
        return $this->belongsTo(OrderMon::class, 'order_id');
    }
}
