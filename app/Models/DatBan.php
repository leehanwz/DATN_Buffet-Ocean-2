<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatBan extends Model
{
    protected $table = 'dat_ban';

    protected $fillable = [
        'ten_khach', 'so_dien_thoai', 'ngay_dat', 'gio_dat', 'so_luong_nguoi', 'ghi_chu'
    ];

    public function hoaDon()
    {
        return $this->hasOne(HoaDon::class, 'dat_ban_id');
    }
}