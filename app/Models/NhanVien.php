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
}
