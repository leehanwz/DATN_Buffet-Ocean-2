<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChiTietOrder extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_order';

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

    public $timestamps = false;

    // Quan hệ với món ăn
    public function mon()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }

    // Quan hệ với đơn hàng
    public function order()
    {
        return $this->belongsTo(OrderMon::class, 'order_id');
    }

    /**
     * Sự kiện tự động cập nhật tổng món và tổng tiền khi thêm/sửa/xóa món.
     */
    protected static function booted()
    {
        static::saved(function ($chiTiet) {
            self::capNhatTongOrder($chiTiet->order_id);
        });

        static::deleted(function ($chiTiet) {
            self::capNhatTongOrder($chiTiet->order_id);
        });
    }

    /**
     * Hàm cập nhật tổng món và tổng tiền trong OrderMon.
     */
    public static function capNhatTongOrder($orderId)
    {
        $order = OrderMon::with('datBan.comboBuffet')->find($orderId);
        if (!$order) return;

        // Tổng số lượng món
        $tongMon = self::where('order_id', $orderId)->sum('so_luong');

        // Tổng tiền món gọi thêm
        $tongTienMon = self::where('order_id', $orderId)
            ->join('mon_an', 'chi_tiet_order.mon_an_id', '=', 'mon_an.id')
            ->sum(DB::raw('chi_tiet_order.so_luong * mon_an.gia'));

        // Tính thêm giá combo (nếu có)
        $giaCombo = $order->datBan->comboBuffet->gia_co_ban ?? 0;
        $soKhach = $order->datBan->so_khach ?? 0;

        $tongTien = ($giaCombo * $soKhach) + $tongTienMon;

        // Cập nhật lại tổng món & tổng tiền trong order_mon
        $order->update([
            'tong_mon' => $tongMon,
            'tong_tien' => $tongTien,
        ]);
    }
}
