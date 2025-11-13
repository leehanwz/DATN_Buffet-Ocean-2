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
     * Accessor: Tính tiền từng món (bao gồm phụ phí nếu vượt)
     */
    public function getThanhTienAttribute()
    {
        $mon = $this->monAn;
        if (!$mon) return 0;

        $soLuong = $this->so_luong ?? 0;
        $giaMon = $mon->gia ?? 0;

        // 1️⃣ Món combo
        if ($this->loai_mon === 'combo') {
            $order = $this->orderMon;
            $combo = $order?->datBan?->comboBuffet;
            $giaCombo = $combo?->gia_co_ban ?? 0;
            return $soLuong * $giaCombo;
        }

        // 2️⃣ Món gọi thêm
        if ($this->loai_mon === 'goi_them') {
            $comboMon = \App\Models\MonTrongCombo::where('mon_an_id', $mon->id)->first();

            $gioiHanMon = $comboMon->gioi_han_so_luong ?? 0;
            $phuPhiMon = $comboMon->phu_phi_goi_them ?? 0;
            if (!$comboMon) return $soLuong * $giaMon;

            $gioiHanMon = $comboMon->gioi_han_so_luong ?? 0;
            $phuPhiMon = $comboMon->phu_phi_goi_them ?? 0;

            // Tổng combo + gọi thêm của món này
            $tongCombo = self::where('order_id', $this->order_id)
                ->where('mon_an_id', $mon->id)
                ->where('loai_mon', 'combo')
                ->sum('so_luong');

            $tongGoiThem = self::where('order_id', $this->order_id)
                ->where('mon_an_id', $mon->id)
                ->where('loai_mon', 'goi_them')
                ->sum('so_luong');

            // Tổng số lượng hiện tại (combo + gọi thêm)
            $tongTatCa = $tongCombo + $tongGoiThem;

            // Số lượng vượt giới hạn
            $soVuot = max(0, $tongTatCa - $gioiHanMon);

            // Phụ phí áp dụng cho phần gọi thêm vượt
            $tienPhuPhi = $soVuot * $phuPhiMon;

            // Tiền món gọi thêm
            $tienThuong = $soLuong * $giaMon;

            return $tienThuong + $tienPhuPhi;
        }

        // 3️⃣ Món thường
        return $soLuong * $giaMon;
    }

    /**
     * Cập nhật tổng món và tổng tiền của OrderMon
     */
    public static function capNhatTongOrder($orderId)
    {
        $order = OrderMon::with(['datBan.comboBuffet.monTrongCombo', 'chiTietOrders.monAn'])->find($orderId);
        if (!$order) return;

        $datBan = $order->datBan;
        $combo = $datBan?->comboBuffet;
        $soKhach = $datBan->so_khach ?? 0;
        $giaCombo = $combo?->gia_co_ban ?? 0;

        $chiTietList = self::where('order_id', $orderId)->with('monAn')->get();

        $tongTienGoiThem = 0;
        $tongPhuPhiVuot = 0;
        $tongMonHienThi = $chiTietList->count(); // tổng món hiển thị = số loại món

        $grouped = $chiTietList->groupBy('mon_an_id');

        foreach ($grouped as $monId => $items) {
            $mon = $items->first()->monAn;
            if (!$mon) continue;

            // Tổng gọi thêm
            $tongGoiThem = $items->where('loai_mon', 'goi_them')->sum('so_luong');

            // Tổng combo (mỗi khách 1 phần)
            $tongCombo = 0;
            $gioiHanMon = 0;
            $phuPhiMon = 0;
            $monTrongCombo = \App\Models\MonTrongCombo::where('mon_an_id', $monId)->first();
            $tongCombo = 0;
            $gioiHanMon = 0;
            $phuPhiMon = 0;

            if ($monTrongCombo) {
                $gioiHanMon = $monTrongCombo->gioi_han_so_luong ?? 0;
                $phuPhiMon = $monTrongCombo->phu_phi_goi_them ?? 0;

                // Nếu món có trong combo bàn hiện tại, cộng số lượng combo
                if ($combo && $combo->monTrongCombo->where('mon_an_id', $monId)->first()) {
                    $tongCombo = $soKhach;
                }
            }
            // Tính phụ phí chỉ cho phần gọi thêm vượt giới hạn
            $soVuot = max(0, $tongGoiThem - max(0, $gioiHanMon - $tongCombo));
            $tienPhuPhi = $soVuot * $phuPhiMon;

            // Tiền gọi thêm
            $tienGoiThem = $tongGoiThem * $mon->gia;

            // Cập nhật tổng tiền
            $tongTienGoiThem += $tienGoiThem;
            $tongPhuPhiVuot += $tienPhuPhi;

            // Cập nhật tổng món hiển thị: chỉ đếm 1 cho mỗi loại món có xuất hiện
        }

        // Tổng tiền combo
        $tienCombo = $giaCombo * $soKhach;

        // Tổng tiền cuối cùng
        $tongTien = $tienCombo + $tongTienGoiThem + $tongPhuPhiVuot;

        $order->update([
            'tong_mon' => $tongMonHienThi,
            'tong_tien' => max(0, $tongTien),
        ]);
    }
}
