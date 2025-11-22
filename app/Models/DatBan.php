<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DatBan extends Model
{
    use HasFactory;

    protected $table = 'dat_ban';
    protected $fillable = [
        'ma_dat_ban',
        'ten_khach',
        'sdt_khach',
        'so_khach',
        'ban_id',
        'combo_id',
        'gio_den',
        'thoi_luong_phut',
        'trang_thai',
        'ghi_chu',
        'nhan_vien_id'
    ];

    protected $casts = [
        'gio_den' => 'datetime',      // bắt buộc để Carbon instance
        'thoi_luong_phut' => 'integer',
    ];
    protected $dates = [
        'gio_den', // nếu bạn muốn Laravel tự cast sang Carbon, nhưng có thể parse trực tiếp cũng được
    ];

    public function banAn()
    {
        return $this->belongsTo(BanAn::class, 'ban_id');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id');
    }

    public function comboBuffet()
    {
        return $this->belongsTo(ComboBuffet::class, 'combo_id');
    }

public function getThoiGianConLaiAttribute()
{
    if (!$this->gio_den || !$this->thoi_luong_phut) return null;

    // Bắt đầu tính ngay khi có khách
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $gioKetThuc = $this->gio_den->copy()->addMinutes($this->thoi_luong_phut);

    if ($now->lt($this->gio_den)) {
        return 'Chưa bắt đầu'; // Chưa tới giờ
    }

    if ($now->gt($gioKetThuc)) {
        return 'Đã hết giờ';
    }

    // Tính thời gian còn lại
    $diff = $gioKetThuc->diff($now);
    return sprintf('%02d giờ %02d phút', $diff->h, $diff->i);
}
}
