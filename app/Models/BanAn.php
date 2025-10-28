<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BanAn extends Model
{
    protected $table = 'ban_an';
    public $timestamps = false;

    protected $fillable = [
        'so_ban',
        'so_ghe',
        'trang_thai',
        'khu_vuc_id',
        'ma_qr',
        'duong_dan_qr',
        'ngay_tao',
        'ngay_cap_nhat',
    ];
}
