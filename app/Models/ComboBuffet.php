<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboBuffet extends Model
{
    use HasFactory;

    protected $table = 'combo_buffet';

    protected $fillable = [
        'ten_combo',
        'loai_combo',
        'gia_co_ban',
        'thoi_luong_phut',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'trang_thai',
    ];

    public function monTrongCombo()
    {
        return $this->hasMany(MonTrongCombo::class, 'combo_id');
    }
}
