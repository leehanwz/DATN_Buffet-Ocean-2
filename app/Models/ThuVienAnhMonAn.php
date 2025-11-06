<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThuVienAnhMonAn extends Model
{
    use HasFactory;
    
    // Khai báo tên bảng trong database
    protected $table = 'thu_vien_anh_mon_an'; 
    
    // Khai báo các cột có thể gán hàng loạt (Mass Assignment)
    protected $fillable = [
        'mon_an_id',
        'duong_dan_anh',
    ];

    public function monAn(): BelongsTo
    {
        // Liên kết với MonAn Model thông qua khóa ngoại 'mon_an_id'
        return $this->belongsTo(MonAn::class, 'mon_an_id');
    }
}