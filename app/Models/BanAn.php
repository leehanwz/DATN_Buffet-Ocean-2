<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class BanAn extends Model
{
    protected $table = 'ban_an';

    protected $fillable = [
        'khu_vuc_id',
        'so_ban',
        'ma_qr',
        'duong_dan_qr',
        'so_ghe',
        'trang_thai',
        'giu_ban_tu',
        'giu_den'
    ];

    public function khuVuc()
    {
        return $this->belongsTo(KhuVuc::class, 'khu_vuc_id');
    }
}
