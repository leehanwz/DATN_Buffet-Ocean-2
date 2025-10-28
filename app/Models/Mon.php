<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mon extends Model
{
    protected $table = 'mon_an';

    protected $fillable = [
        'ten_mon', 'gia', 'mo_ta', 'hinh_anh', 'danh_muc_id'
    ];

    public function orderMons()
    {
        return $this->hasMany(OrderMon::class, 'mon_id');
    }

    public function monTrongCombos()
    {
        return $this->hasMany(MonTrongCombo::class, 'mon_id');
    }
}