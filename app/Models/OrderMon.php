<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMon extends Model
{
    use HasFactory;

    protected $table = 'order_mon';
    protected $fillable = [
        'dat_ban_id',
        'ban_id',
        'tong_mon',
        'tong_tien',
        'trang_thai'
    ];

    public function datBan()
    {
        return $this->belongsTo(DatBan::class, 'dat_ban_id');
    }

    public function banAn()
    {
        return $this->belongsTo(BanAn::class, 'ban_id');
    }

    // App\Models\OrderMon.php
    public function chiTietOrders()
    {
        return $this->hasMany(ChiTietOrder::class, 'order_id', 'id');
    }

    public function recalculateTotal()
    {
        // Sử dụng Accessor 'thanh_tien' từ ChiTietOrder để tính tổng chính xác
        $totalAmount = $this->chiTietOrders()->get()->sum(function ($item) {
            return $item->thanh_tien;
        });

        // Tính tổng số lượng món
        $totalQuantity = $this->chiTietOrders()->get()->sum('so_luong');

        $this->update([
            'tong_tien' => $totalAmount,
            'tong_mon' => $totalQuantity,
        ]);
    }
}
