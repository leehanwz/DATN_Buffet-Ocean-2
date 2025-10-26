<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonTrongCombo extends Model
{
    use HasFactory;

    protected $table = 'mon_trong_combo';

    protected $fillable = [
        'combo_id',
        'mon_an_id',
        'gioi_han_goi_mon',
        'phu_phi',
        'trang_thai',
    ];

    // 1 món trong combo thuộc về 1 combo buffet
    public function combo()
    {
        return $this->belongsTo(ComboBuffet::class, 'combo_id');
    }

    // 1 món trong combo thuộc về 1 món ăn cụ thể
    public function monAn()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }
}
