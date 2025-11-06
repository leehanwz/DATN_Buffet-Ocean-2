<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatBan extends Model
{
    use HasFactory;

    // Chỉ định tên bảng vì tên Model (DatBan) khác tên bảng (dat_ban)
    protected $table = 'dat_ban';

    // Các trường được phép gán hàng loạt
    protected $fillable = [
        'ma_dat_ban',
        'ten_khach',
        'sdt_khach',
        'so_khach',
        'ban_id',
        'combo_id',
        'nhan_vien_id',
        'gio_den',
        'thoi_luong_phut',
        'tien_coc',
        'trang_thai',
        'xac_thuc_ma',
        'la_dat_online',
        'ghi_chu',
    ];


    public function banAn()
    {
        return $this->belongsTo(BanAn::class, 'ban_id');
    }


    public function comboBuffet()
    {
        return $this->belongsTo(ComboBuffet::class, 'combo_id');
    }


    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id');
    }
}