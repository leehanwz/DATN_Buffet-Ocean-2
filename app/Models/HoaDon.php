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
     * SỬA 1: XÓA BỎ HÀM booted()
     * * Lý do: Hàm này tự động tạo 'ma_hoa_don' và nó sẽ GHI ĐÈ
     * lên mã hóa đơn mà chúng ta đã tạo trong HoaDonController (dòng: 'ma_hoa_don' => 'HD-' . time() . $datBan->id,).
     * Việc này gây xung đột và khó quản lý. Hãy để Controller xử lý việc tạo mã.
     */
    // protected static function booted() { ... }

    /**
     * Quan hệ với bàn đặt
     * SỬA 2: Xóa bỏ ->with(...) đính kèm.
     * Việc tự động tải quan hệ ở đây (Eager Loading) là không tốt,
     * nó làm chậm truy vấn khi không cần thiết.
     * Hãy để Controller quyết định khi nào cần tải (ví dụ: HoaDon::with('datBan.banAn')->get())
     */
    public function datBan()
    {
        return $this->belongsTo(DatBan::class, 'dat_ban_id');
    }

    /**
     * SỬA 3: XÓA BỎ QUAN HỆ orderMons()
     *
     * Lý do: Đây là mấu chốt của lỗi.
     * CSDL chung không có cột 'hoa_don_id', vì vậy
     * HoaDon KHÔNG THỂ có quan hệ trực tiếp với OrderMon.
     */
    // public function orderMons() { ... }

    /**
     * SỬA 4: XÓA BỎ HÀM tinhTongTien()
     *
     * Lý do: Logic của hàm này (tính từ combo, lặp qua orderMons)
     * đã bị sai và không còn phù hợp.
     * Trong Controller, chúng ta đã TÍNH TOÁN và LƯU TRỮ giá trị này
     * vào cột 'tong_tien' của hóa đơn.
     * Chúng ta sẽ sử dụng giá trị đã lưu đó.
     */
    // public function tinhTongTien(): float { ... }

    /**
     * Tính tiền phải thanh toán = tổng tiền - tiền giảm + phụ thu
     *
     * SỬA 5: Sửa lại hàm này để sử dụng các giá trị ĐÃ LƯU
     * trong CSDL, thay vì gọi hàm tinhTongTien() không còn tồn tại.
     */
    public function tinhDaThanhToan(): float
    {
        // Sử dụng các thuộc tính (cột) đã được lưu của Model
        $tongTien = $this->tong_tien ?? 0;
        $tienGiam = $this->tien_giam ?? 0;
        $phuThu = $this->phu_thu ?? 0;

        return $tongTien - $tienGiam + $phuThu;
    }

    /**
     * Tính tiền trả lại khi khách đưa tiền mặt
     *
     * (Hàm này đã đúng, vì nó gọi tinhDaThanhToan()
     * mà chúng ta vừa sửa ở trên)
     *
     * @param float $tienKhachDua
     * @return float
     */
    public function tienTraLai(float $tienKhachDua): float
    {
        return max(0, $tienKhachDua - $this->tinhDaThanhToan());
    }
}