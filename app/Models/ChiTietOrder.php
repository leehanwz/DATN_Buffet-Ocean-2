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

    /**
     * SỬA LỖI SEEDER TẠI ĐÂY:
     * Khi ChiTietOrder được lưu, gọi hàm 'recalculateTotal' 
     * từ Model 'OrderMon' (thay vì gọi hàm 'self::' cũ)
     */
    protected static function booted()
    {
        static::saved(function ($chiTiet) {
            // Lấy OrderMon cha và gọi hàm tính toán của nó
            $order = $chiTiet->orderMon; 
            if ($order) {
                $order->recalculateTotal(); // 💡 Gọi hàm mới bên OrderMon.php
            }
        });

        static::deleted(function ($chiTiet) {
            // Tương tự khi xóa
            $order = $chiTiet->orderMon;
            if ($order) {
                $order->recalculateTotal(); // 💡 Gọi hàm mới bên OrderMon.php
            }
        });
    }

    /**
     * Accessor tính TIỀN PHÁT SINH (Phụ phí) của 1 dòng chi tiết
     * (Hàm này giữ nguyên như cũ)
     */
    public function getThanhTienAttribute()
    {
        $mon = $this->monAn;
        if (!$mon) return 0;

        $soLuong = $this->so_luong ?? 0;
        $giaMon = $mon->gia ?? 0;

        // 1. Nếu là món GỌI THÊM
        if ($this->loai_mon === 'goi_them') {
            return $soLuong * $giaMon;
        }

        // 2. Nếu là món COMBO
        if ($this->loai_mon === 'combo') {
            
            $order = $this->orderMon;
            $comboId = $order?->datBan?->combo_id;

            if (!$comboId) return 0; 

            $comboMon = \App\Models\MonTrongCombo::where('mon_an_id', $mon->id)
                                                ->where('combo_id', $comboId)
                                                ->first();

            if (!$comboMon) return 0; 

            $gioiHanMon = $comboMon->gioi_han_so_luong;
            $phuPhiMon = $comboMon->phu_phi_goi_them ?? 0;

            if (is_null($gioiHanMon) || $gioiHanMon == 0 || $phuPhiMon == 0) {
                return 0;
            }
            
            $soVuot = ($soLuong > $gioiHanMon) ? ($soLuong - $gioiHanMon) : 0;

            return $soVuot * $phuPhiMon;
        }

        return 0;
    }

    /* * ĐÃ XÓA HÀM self::capNhatTongOrder()
     * Logic này đã được chuyển sang OrderMon::recalculateTotal()
     */
}