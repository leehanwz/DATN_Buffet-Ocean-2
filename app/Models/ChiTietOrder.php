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
     * Khi lưu hoặc xóa chi tiết order thì cập nhật lại tổng tiền/tổng món
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
     * Accessor tính tiền từng món
     * - Nếu là combo → giá combo
     * - Nếu là gọi thêm → giá món + phụ phí vượt giới hạn
     * - Còn lại → giá món thường
     */
    public function getThanhTienAttribute()
    {
        $mon = $this->monAn;
        if (!$mon) return 0;

        $soLuong = $this->so_luong ?? 0;
        $giaMon = $mon->gia ?? 0;

        // ✅ Nếu là món combo → dùng giá combo buffet
        if ($this->loai_mon === 'combo') {
            $order = $this->orderMon;
            $combo = $order?->datBan?->comboBuffet;
            $giaCombo = $combo?->gia_co_ban ?? 0;

            return $soLuong * $giaCombo;
        }

        // ✅ Nếu là món gọi thêm → tính phụ phí nếu vượt giới hạn
        if ($this->loai_mon === 'goi_them') {
            $comboMon = \App\Models\MonTrongCombo::where('mon_an_id', $mon->id)->first();

            if (!$comboMon) {
                return $soLuong * $giaMon;
            }

            $gioiHanMon = $comboMon->gioi_han_so_luong ?? 0;
            $phuPhiMon = $comboMon->phu_phi_goi_them ?? 0;
            $soVuot = ($gioiHanMon > 0 && $soLuong > $gioiHanMon) ? ($soLuong - $gioiHanMon) : 0;

            return ($soLuong * $giaMon) + ($soVuot * $phuPhiMon);
        }

        // Loại khác → mặc định giá món thường
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

        // Lấy tất cả chi tiết món trong order
        $chiTietList = self::where('order_id', $orderId)->with('monAn')->get();

        $tongMonHienThi = 0;
        $tongTienGoiThem = 0;
foreach ($chiTietList as $ct) {
            $mon = $ct->monAn;
            if (!$mon) continue;

            if ($ct->loai_mon === 'goi_them') {
                $tongTienGoiThem += $ct->thanh_tien;
                $tongMonHienThi += 1; // chỉ đếm 1 dòng
            }

            if ($ct->loai_mon === 'combo') {
                $tongMonHienThi += 1;
            }
        }

        // ✅ Tổng tiền = (giá combo × số khách) + tổng tiền món gọi thêm
        $tongTien = ($giaCombo * $soKhach) + $tongTienGoiThem;

        $order->update([
            'tong_mon' => $tongMonHienThi,
            'tong_tien' => max(0, $tongTien),
        ]);
    }
}
