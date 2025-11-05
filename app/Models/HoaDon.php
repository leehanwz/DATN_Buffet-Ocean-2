<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\CommonMark\Parser\Inline\BangParser;

class HoaDon extends Model
{
    protected $table = 'hoa_don';

    protected $fillable = [
        'dat_ban_id',
        'tong_tien',
        'ngay_tao',
        'nhan_vien_id'
    ];

    public function datBan()
    {
        return $this->belongsTo(BanAn::class, 'dat_ban_id');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id');
    }

    public function orderMons()
    {
        return $this->hasMany(OrderMon::class, 'hoa_don_id');
    }
}
