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
        'ghi_chu',
        'trang_thai',
        'loai_mon',
    ];

    public function orderMon()
    {
        return $this->belongsTo(OrderMon::class, 'order_id');
    }

    public function monAn()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }

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
     * Accessor tính tiền từng món, bao gồm phụ phí nếu là món gọi thêm
     */
    public function getThanhTienAttribute()
    {
        $mon = $this->monAn;
        if (!$mon) return 0;

        $soLuong = $this->so_luong ?? 0;
        $giaMon = $mon->gia ?? 0;

        if ($this->loai_mon === 'goi_them') {
            $comboMon = \App\Models\MonTrongCombo::where('mon_an_id', $mon->id)->first();
            $gioiHanMon = $comboMon->gioi_han_so_luong ?? 0;
            $phuPhiMon = $comboMon->phu_phi_goi_them ?? 0;
            $soVuot = ($gioiHanMon > 0 && $soLuong > $gioiHanMon) ? ($soLuong - $gioiHanMon) : 0;

            return ($soLuong * $giaMon) + ($soVuot * $phuPhiMon);
        }

        // Món trong combo → không tính phụ phí
        return $soLuong * $giaMon;
    }

    /**
     * Cập nhật tổng món và tổng tiền của OrderMon
     */
    public static function capNhatTongOrder($orderId)
    {
        $order = OrderMon::with(['datBan.comboBuffet'])->find($orderId);
        if (!$order) return;

        $datBan = $order->datBan;
        $combo = $datBan->comboBuffet;

        $soKhach = $datBan->so_khach ?? 0;
        $giaCombo = $combo->gia_co_ban ?? 0;

        // Lấy tất cả chi tiết món còn lại
        $chiTietList = self::where('order_id', $orderId)->with('monAn')->get();

        $tongMonHienThi = 0;  // tổng số món hiển thị
        $tongTienGoiThem = 0;  // tổng tiền món gọi thêm + phụ phí

        foreach ($chiTietList as $ct) {
            $mon = $ct->monAn;
            if (!$mon) continue;

            if ($ct->loai_mon === 'goi_them') {
                $tongTienGoiThem += $ct->thanh_tien;
                $tongMonHienThi += 1; // hiển thị 1 món dù số lượng bao nhiêu
            }

            if ($ct->loai_mon === 'combo') {
                $tongMonHienThi += 1;
            }
        }

        // Tổng tiền = combo + món gọi thêm còn lại
        $tongTien = ($giaCombo * $soKhach) + $tongTienGoiThem;

        $order->update([
            'tong_mon' => $tongMonHienThi,
            'tong_tien' => max(0, $tongTien),
        ]);
    }
}
