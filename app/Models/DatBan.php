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
    if (!$this->gio_den) {
        return null; // chưa tới giờ hoặc chưa xác nhận khách đã đến
    }

    $gioDen = \Carbon\Carbon::parse($this->gio_den);
    $bayGio = \Carbon\Carbon::now();

    // Nếu thời gian chưa bắt đầu → không tính
    if ($bayGio->lt($gioDen)) {
        return "Chưa bắt đầu";
    }

    // Nếu có combo → lấy phút combo
    if ($this->comboBuffet && $this->comboBuffet->thoi_luong) {
        $tongPhut = $this->comboBuffet->thoi_luong;
    } else {
        $tongPhut = 120; // mặc định 120 phút
    }

    // thời gian đã sử dụng
    $phutDaSuDung = $gioDen->diffInMinutes($bayGio);

    // tính thời gian còn lại
    $phutConLai = $tongPhut - $phutDaSuDung;

    if ($phutConLai <= 0) {
        return "ĐÃ HẾT GIỜ";
    }

    $gio = floor($phutConLai / 60);
    $phut = $phutConLai % 60;

    return sprintf("%02d:%02d", $gio, $phut);
}
}
