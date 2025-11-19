<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien';

    protected $fillable = [
        'ho_ten',
        'sdt',
        'email',
        'mat_khau',
        'vai_tro',
        'trang_thai',
    ];

    /**
     * Quan hệ: Một nhân viên có thể có nhiều đơn đặt bàn (phục vụ)
     */
    public function datBans()
    {
        return $this->hasMany(DatBan::class, 'nhan_vien_id', 'id');
    }

    /**
     * Kiểm tra nhân viên có phải quản lý không
     */
    public function isQuanLy()
    {
        return $this->vai_tro === 'quan_ly';
    }

    /**
     * Kiểm tra nhân viên có phải bếp không
     */
    public function isBep()
    {
        return $this->vai_tro === 'bep';
    }

    /**
     * Kiểm tra nhân viên có phải phục vụ không
     */
    public function isPhucVu()
    {
        return $this->vai_tro === 'phuc_vu';
    }

    /**
     * Lấy trạng thái dạng chữ theo giá trị số
     */
    public function getTrangThaiText()
    {
        switch ($this->trang_thai) {
            case 0:
                return 'Nghỉ';
            case 1:
                return 'Đang làm';
            case 2:
                return 'Khóa';
            default:
                return 'Không xác định';
        }
    }

    /**
     * Kiểm tra trạng thái nhân viên
     */
    public function isDangLam()
    {
        return $this->trang_thai === 1;
    }

    public function isNghi()
    {
        return $this->trang_thai === 0;
    }

    public function isKhoa()
    {
        return $this->trang_thai === 2;
    }
}