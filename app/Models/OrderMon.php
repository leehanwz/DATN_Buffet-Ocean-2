<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMon extends Model
{
    protected $table = 'order_mon';

    protected $fillable = [
        'hoa_don_id',
        'mon_id',
        'so_luong',
        'gia'
    ];

    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'hoa_don_id');
    }

    public function mon()
    {
        return $this->belongsTo(MonAn::class, 'mon_id');
    }
}
