<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhan_vien';

    protected $fillable = [
        'ho_ten',
        'sdt',
        'so_dien_thoai',
        'email'
    ];

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class, 'nhan_vien_id');
    }
}
