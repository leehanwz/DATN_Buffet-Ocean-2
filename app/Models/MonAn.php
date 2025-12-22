<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- PHẢI THÊM: cho mối quan hệ HasMany

class MonAn extends Model
{
    use HasFactory;

    protected $table = 'mon_an';

    protected $fillable = [
        'danh_muc_id',
        'ten_mon',
        'gia',
        'mo_ta',
        'hinh_anh',
        'trang_thai',
        'thoi_gian_che_bien',
        'loai_mon',
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id');
    }

    /**
     * Mối quan hệ với thư viện ảnh (HasMany)
     * Đây là phần bổ sung để sửa lỗi RelationNotFoundException
     */
    public function thuVienAnh(): HasMany
    {
        // Liên kết với Model ThuVienAnhMonAn thông qua khóa ngoại 'mon_an_id'
        return $this->hasMany(ThuVienAnhMonAn::class, 'mon_an_id');
    }
    // -------------------------------------------------------------------

    public function getTrangThaiDisplayAttribute()
    {
        switch ($this->trang_thai) {
            case 'con':
                return 'Còn món';
            case 'het':
                return 'Hết món';
            case 'an':
                return 'Ẩn';
            default:
                return 'Không rõ';
        }
    }

    public function getTrangThaiBadgeAttribute()
    {
        switch ($this->trang_thai) {
            case 'con':
                return 'bg-success';
            case 'het':
                return 'bg-warning';
            case 'an':
                return 'bg-secondary text-white';
            default:
                return 'bg-light text-dark';
        }
    }

    /**
     * Accessor: Tự động trả về class màu sắc cho Danh Mục (Dùng ID để gán màu động)
     */
    public function getDanhMucBadgeAttribute()
    {
        $colors = [
            'badge-primary',
            'badge-success',
            'badge-danger',
            'badge-warning',
            'badge-info',
            'badge-dark',
            'badge-secondary',
        ];

        // Lấy danh mục ID một cách an toàn
        $id = $this->danh_muc_id;

        if (!$id) {
            // Nếu không có ID (món chưa được gán danh mục), trả về màu xám nhạt
            return 'badge badge-light text-dark'; 
        }

        // Dùng phép toán Modulo (%) để chọn màu cố định theo ID
        $colorIndex = ($id - 1) % count($colors);

        return 'badge ' . $colors[$colorIndex];
    }
}