<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_muc_mon';

    protected $fillable = [
        'ten_danh_muc',
        'mo_ta',
        'hien_thi',
    ];

    public function monAn()
    {
        return $this->hasMany(MonAn::class, 'danh_muc_id');
    }
}
