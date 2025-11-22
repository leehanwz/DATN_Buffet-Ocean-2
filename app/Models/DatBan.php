<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'nhan_vien_id',
        'gio_den',
        'thoi_luong_phut',
        'tien_coc',
        'trang_thai',
        'gio_xac_nhan',
        'xac_thuc_ma',
        'la_dat_online',
        'ghi_chu',
    ];

  protected $casts = [
    'gio_den' => 'datetime',
    'gio_xac_nhan' => 'datetime',
];

    public function banAn() { return $this->belongsTo(BanAn::class,'ban_id'); }
    public function comboBuffet() { return $this->belongsTo(ComboBuffet::class,'combo_id')->withDefault(['gia_co_ban'=>0]); }
    public function nhanVien() { return $this->belongsTo(NhanVien::class,'nhan_vien_id'); }
    public function orderMon() { return $this->hasMany(OrderMon::class,'dat_ban_id'); }
    public function hoaDon() { return $this->hasOne(HoaDon::class,'dat_ban_id'); }

    // Tính thời gian còn lại
public function getThoiGianConLaiAttribute()
{
    if (!$this->gio_xac_nhan || !in_array($this->trang_thai, ['da_xac_nhan','khach_da_den'])) {
        return null;
    }

    $minutes = $this->thoi_luong_phut ?? 120;
    $end = $this->gio_xac_nhan->copy()->addMinutes($minutes);
    $diff = $end->diffInSeconds(now(), false);

    if ($diff <= 0) return 'Đã hết giờ';

    $h = floor($diff / 3600);
    $m = floor(($diff % 3600) / 60);
    $s = $diff % 60;

    return "{$h} giờ {$m} phút {$s} giây";
}

}
