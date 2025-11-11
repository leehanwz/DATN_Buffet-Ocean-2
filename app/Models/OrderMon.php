<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use App\Models\ChiTietOrder; 
use App\Models\MonTrongCombo; // 💡 BẮT BUỘC THÊM DÒNG NÀY

class OrderMon extends Model
{
    use HasFactory;

    protected $table = 'order_mon';
    protected $fillable = [
        'dat_ban_id',
        'ban_id',
        'tong_mon',
        'tong_tien',
        'trang_thai'
    ];

    public function datBan()
    {
        return $this->belongsTo(DatBan::class, 'dat_ban_id');
    }

    public function banAn()
    {
        return $this->belongsTo(BanAn::class, 'ban_id');
    }

    public function chiTietOrders(): HasMany
    {
        return $this->hasMany(ChiTietOrder::class, 'order_id', 'id');
    }

    /**
     * SỬA LỖI TÍNH PHỤ PHÍ:
     * Tính lại tổng tiền, bao gồm cả phụ phí (hoặc giá gốc) khi vượt giới hạn.
     */
    public function recalculateTotal()
    {
        // 0. Lấy thông tin cơ bản (phải kiểm tra null)
        $datBan = $this->datBan;
        if (!$datBan) {
            $this->update(['tong_tien' => 0, 'tong_mon' => 0]);
            return;
        }

        $soKhach = $datBan->so_khach ?? 0;
        $comboId = $datBan->combo_id;
        $giaCombo = $datBan->comboBuffet?->gia_co_ban ?? 0;

        // 1. TÍNH TIỀN VÉ CƠ BẢN
        $tienVeCoBan = $soKhach * $giaCombo;

        // 2. Lấy tất cả chi tiết
        $allItems = $this->chiTietOrders()->with('monAn')->get();
        $tongMonHienThi = $allItems->count(); // Đếm tổng số dòng

        // 3. TÍNH TIỀN MÓN GỌI THÊM
        // (Đây là các món 'goi_them' KHÔNG thuộc buffet, ví dụ Coca-Cola)
        $tongTienGoiThem = 0;
        foreach ($allItems->where('loai_mon', 'goi_them') as $item) {
            $tongTienGoiThem += $item->thanh_tien; 
        }

        // 4. TÍNH PHỤ PHÍ MÓN COMBO (Logic chính sửa ở đây)
        $tongTienPhuPhi = 0;
        if ($comboId) {
            // Lấy TẤT CẢ các món trong combo, CÙNG VỚI GIÁ GỐC (qua monAn)
            $monTrongComboDefs = MonTrongCombo::where('combo_id', $comboId)
                ->with('monAn') // Eager load monAn để lấy giá gốc
                ->get()
                ->keyBy('mon_an_id'); // [mon_id => MonTrongCombo object]

            // Nhóm các món combo đã gọi theo mon_an_id và tính tổng số lượng
            $monComboDaGoi = $allItems->where('loai_mon', 'combo')
                ->groupBy('mon_an_id')
                ->map(function ($group) {
                    return $group->sum('so_luong'); // [mon_id => tong_so_luong]
                });

            // So sánh tổng đã gọi với giới hạn
            foreach ($monComboDaGoi as $monId => $tongSoLuong) {
                
                // Kiểm tra xem món này có định nghĩa trong combo không
                if (isset($monTrongComboDefs[$monId])) {
                    
                    $def = $monTrongComboDefs[$monId]; // Định nghĩa món trong combo
                    $gioiHan = $def->gioi_han_so_luong;
                    
                    // Nếu không có giới hạn (NULL or 0), bỏ qua, món này miễn phí
                    if (is_null($gioiHan) || $gioiHan == 0) {
                        continue;
                    }

                    // Nếu vượt giới hạn
                    if ($tongSoLuong > $gioiHan) {
                        $soVuot = $tongSoLuong - $gioiHan;
                        
                        // 💡 LOGIC SỬA: Lấy phụ phí, NẾU NULL thì lấy giá gốc của món
                        $phuPhi = $def->phu_phi_goi_them ?? $def->monAn?->gia ?? 0;
                        
                        $tongTienPhuPhi += $soVuot * $phuPhi;
                    }
                }
            }
        }

        // 5. TÍNH TỔNG CUỐI CÙNG
        $tongTienCuoiCung = $tienVeCoBan + $tongTienGoiThem + $tongTienPhuPhi;

        // 6. Cập nhật
        $this->update([
            'tong_tien' => max(0, $tongTienCuoiCung),
            'tong_mon' => $tongMonHienThi,
        ]);
    }
}