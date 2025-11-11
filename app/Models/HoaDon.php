<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    // Bảng trong DB
    protected $table = 'hoa_don';

    // Các trường được phép gán hàng loạt
    protected $fillable = [
        'dat_ban_id',
        'tong_tien',
        'tien_giam',
        'phu_thu',
        'da_thanh_toan',
        'phuong_thuc_tt',
        'ma_hoa_don',
    ];

    /**
     * Tự động sinh mã hóa đơn khi tạo mới
     */
    protected static function booted()
    {
        static::creating(function ($hoaDon) {
            $date = date('Ymd'); // YYYYMMDD
            $lastId = self::whereDate('created_at', today())->max('id') ?? 0;
            $hoaDon->ma_hoa_don = 'HD' . $date . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        });
    }

    /**
     * Quan hệ với bàn đặt
     */
    public function datBan()
    {
        return $this->belongsTo(DatBan::class, 'dat_ban_id')->with('banAn', 'comboBuffet.monTrongCombo');
    }

    /**
     * Quan hệ với các order món của hóa đơn
     */
    public function orderMons()
    {
        // Chỉ lấy order đã gán vào hóa đơn này
        return $this->hasMany(OrderMon::class, 'hoa_don_id', 'id')->with('mon');
    }

    /**
     * Tính tổng tiền món ăn trong hóa đơn
     */
    public function tinhTongTien(): float
    {
        $tong = 0;

        // Tổng món trong combo
        if ($this->datBan && $this->datBan->comboBuffet) {
            foreach ($this->datBan->comboBuffet->monTrongCombo as $mon) {
                $tong += $mon->so_luong * $mon->gia;
            }
        }

        // Tổng món order thêm
        foreach ($this->orderMons as $order) {
            $tong += $order->so_luong * $order->gia;
        }

        return $tong;
    }

    /**
     * Tính tiền phải thanh toán = tổng tiền - tiền giảm + phụ thu
     */
    public function tinhDaThanhToan(): float
    {
        return $this->tinhTongTien() - ($this->tien_giam ?? 0) + ($this->phu_thu ?? 0);
    }

    /**
     * Tính tiền trả lại khi khách đưa tiền mặt
     *
     * @param float $tienKhachDua
     * @return float
     */
    public function tienTraLai(float $tienKhachDua): float
    {
        return max(0, $tienKhachDua - $this->tinhDaThanhToan());
    }
}
