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
        'gioi_han_so_luong',
        'phu_phi_goi_them',
    ];

    public function combo()
    {
        return $this->belongsTo(ComboBuffet::class, 'combo_id');
    }

    public function monAn()
    {
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }

    //  * Hiển thị trạng thái combo (dang_ban / ngung_ban) có màu và chữ đẹp
    public function getTrangThaiComboBadgeAttribute()
    {
        if (!$this->combo) {
            return '<span class="badge bg-secondary">Không có combo</span>';
        }

        $status = $this->combo->trang_thai ?? 'khong_ro';

        return match ($status) {
            'dang_ban' => '<span class="badge bg-success">Đang bán</span>',
            'ngung_ban' => '<span class="badge bg-danger bg-opacity-50 text-danger">Ngừng bán</span>',
            default => '<span class="badge bg-light text-dark">Không rõ</span>',
        };
    }
}
