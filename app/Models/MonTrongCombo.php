<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonTrongCombo extends Model
{
    use HasFactory;

    protected $table = 'mon_trong_combo';

    /**
     * SỬA LẠI TÊN TRƯỜNG CHO ĐÚNG VỚI DATABASE
     * 1. 'gioi_han_goi_mon' -> 'gioi_han_so_luong'
     * 2. Xóa 'trang_thai' (vì DB không có)
     */
    protected $fillable = [
        'combo_id',
        'mon_an_id',
        'gioi_han_so_luong', // <-- ĐÃ SỬA
        'phu_phi_goi_them',
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