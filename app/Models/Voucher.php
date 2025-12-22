<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
     * Tên bảng trong cơ sở dữ liệu.
     *
     * @var string
     */
    protected $table = 'vouchers';

    /**
     * Các trường có thể gán hàng loạt.
     *
     * @var array
     */
    protected $fillable = [
        'ma_voucher',
        'loai_giam',
        'gia_tri',
        'gia_tri_toi_da',
        'mo_ta',
        'so_luong',
        'so_luong_da_dung',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
    ];

    /**
     * Tự động chuyển đổi kiểu dữ liệu.
     *
     * @var array
     */
    protected $casts = [
        'gia_tri' => 'float',
        'gia_tri_toi_da' => 'float',
        'so_luong' => 'integer',
        'so_luong_da_dung' => 'integer',
        'ngay_bat_dau' => 'datetime', // Giúp chuyển đổi thành đối tượng Carbon
        'ngay_ket_thuc' => 'datetime', // Giúp chuyển đổi thành đối tượng Carbon
    ];

    /**
     * Quan hệ ngược: Một voucher có thể thuộc về nhiều hoá đơn.
     */
    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class, 'voucher_id');
    }
}