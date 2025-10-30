<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    use HasFactory;

    protected $table = 'mon_an';

    protected $fillable = [
        'danh_muc_id',
        'ten_mon',
        'gia',
        'mo_ta',
        'hinh_anh',
        'trang_thai',
        'thoi_gian_che_bien',
        'loai_mon'
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMucMon::class, 'danh_muc_id');
    }
}
