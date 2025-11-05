<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietOrder extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_order';

    protected $fillable = [
        'order_id',
        'mon_an_id',
        'so_luong',
        'don_gia',
        'ghi_chu',
    ];

    public function getThanhTienAttribute()
    {
        // Đảm bảo số lượng và đơn giá là số trước khi nhân
        $soLuong = (int) $this->so_luong;
        $donGia = (float) $this->don_gia;

        return $soLuong * $donGia;
    }

    public function orderMon()
    {
        return $this->belongsTo(OrderMon::class, 'order_id', 'id');
    }

    public function monAn()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id', 'id');
    }
}
