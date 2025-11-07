<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietOrder extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_order';

    protected $fillable = [
        'order_id',
        'mon_an_id',
        'so_luong',
        'ghi_chu',
        'trang_thai',
        'loai_mon',
    ];



    public function orderMon()
    {
        return $this->belongsTo(OrderMon::class, 'order_id');
    }

    public function monAn()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }
}
