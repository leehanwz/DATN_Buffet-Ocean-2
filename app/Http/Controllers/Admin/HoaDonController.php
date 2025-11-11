<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\DatBan;

class HoaDonController extends Controller
{
    /**
     * HIỂN THỊ DANH SÁCH HÓA ĐƠN
     * Tải quan hệ: Hóa đơn -> Đặt Bàn -> Bàn Ăn
     * Tải quan hệ: Hóa đơn -> Đặt Bàn -> Phiếu Order
     */
    public function index()
    {
        $hoadons = HoaDon::with([
            'datBan.banAn', 
            'datBan.orderMon'
        ])->latest()->get();

        return view('admins.hoa-don.index', compact('hoadons'));
    }

    /**
     * HIỂN THỊ FORM TẠO MỚI
     * Tải các bàn ở trạng thái 'hoan_tat'
     * Tải kèm quan hệ (with) để View 'create.blade.php' có thể tính tạm tính.
     */
    public function create()
    {
        $datBans = DatBan::with('banAn', 'comboBuffet', 'orderMon')
            ->where('trang_thai', 'hoan_tat')
            ->get();
            
        return view('admins.hoa-don.create', compact('datBans'));
    }

    /**
     * LƯU HÓA ĐƠN MỚI
     * Logic đã sửa: Tính tổng tiền từ 'orderMon' của 'datBan'.
     * Không còn liên quan đến 'hoa_don_id' trong 'order_mon'.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id|unique:hoa_don,dat_ban_id', // Thêm unique để đảm bảo 1 dat_ban chỉ có 1 HĐ
            'phuong_thuc_tt' => 'required|string',
            'tien_giam' => 'nullable|numeric|min:0',
            'phu_thu' => 'nullable|numeric|min:0',
        ]);

        // 1. Tải DatBan và các OrderMon của nó
        $datBan = DatBan::with('orderMon', 'banAn')->findOrFail($request->dat_ban_id);

        // 2. Tạo hóa đơn (chưa có tổng tiền)
        $hoaDon = HoaDon::create([
            'dat_ban_id' => $datBan->id,
            'ma_hoa_don' => 'HD' . date('Ymd-') . $datBan->id, // Tạo mã HĐ dễ đọc
            'tien_giam' => (float) ($request->tien_giam ?? 0),
            'phu_thu' => (float) ($request->phu_thu ?? 0),
            'phuong_thuc_tt' => $request->phuong_thuc_tt,
        ]);

        // 3. Tính tổng tiền từ các 'order_mon' (CSDL đã có cột 'tong_tien')
        $tongTienOrder = $datBan->orderMon->sum('tong_tien');
        
        // 4. Tính tiền cọc (nếu có)
        $tienCoc = (float) ($datBan->tien_coc ?? 0);

        // 5. Tính số tiền khách phải trả cuối cùng
        // (Tổng Order) - (Giảm giá) + (Phụ thu) - (Tiền cọc)
        $daThanhToan = $tongTienOrder - $hoaDon->tien_giam + $hoaDon->phu_thu - $tienCoc;

        // 6. Cập nhật lại tổng tiền cho hóa đơn
        $hoaDon->update([
            'tong_tien' => $tongTienOrder,     // Tổng tiền gốc
            'da_thanh_toan' => $daThanhToan, // Số tiền thực tế sau giảm/phụ thu/cọc
        ]);

        // 7. Cập nhật trạng thái bàn về "trống"
        if ($datBan->banAn) {
            $datBan->banAn->update(['trang_thai' => 'trong']);
        }

        return redirect()->route('admin.hoa-don.index')
            ->with('success', 'Tạo hóa đơn thành công!');
    }

    /**
     * HIỂN THỊ CHI TIẾT HÓA ĐƠN
     * Tải lồng 4 cấp để View 'show.blade.php' có thể lặp qua chi tiết món ăn.
     */
    public function show($id)
    {
        $hoaDon = HoaDon::with([
            'datBan.banAn', 
            'datBan.comboBuffet',
            'datBan.orderMon.chiTietOrders.monAn' // Tải lồng 4 cấp
        ])->findOrFail($id);

        return view('admins.hoa-don.show', compact('hoaDon'));
    }

    /**
     * HIỂN THỊ FORM CHỈNH SỬA
     */
    public function edit($id)
    {
        // Tải kèm 'datBan' và các quan hệ cần thiết để view hiển thị
        $hoaDon = HoaDon::with('datBan.banAn', 'datBan.comboBuffet')->findOrFail($id);
        
        // Không cần tải $datBans nữa vì không cho sửa
        
        return view('admins.hoa-don.edit', compact('hoaDon'));
    }

    /**
     * CẬP NHẬT HÓA ĐƠN (LOGIC ĐÃ SỬA)
     * Chỉ cập nhật thông tin thanh toán, KHÔNG cho đổi 'dat_ban_id'.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // Bỏ 'dat_ban_id' khỏi validate
            'phuong_thuc_tt' => 'required|string',
            'tien_giam' => 'nullable|numeric|min:0',
            'phu_thu' => 'nullable|numeric|min:0',
            'da_thanh_toan' => 'nullable|numeric|min:0',
        ]);

        $hoaDon = HoaDon::findOrFail($id);

        // Lấy các giá trị mới hoặc giữ lại giá trị cũ
        $tienGiam = (float) ($request->tien_giam ?? $hoaDon->tien_giam);
        $phuThu = (float) ($request->phu_thu ?? $hoaDon->phu_thu);
        
        // Lấy tổng tiền gốc (đã được lưu từ lúc store)
        $tongTienGoc = $hoaDon->tong_tien;

        // Lấy tiền cọc (nếu có)
        $tienCoc = (float) ($hoaDon->datBan->tien_coc ?? 0);

        // Tính lại số tiền thanh toán
        // (Tổng Order) - (Giảm giá) + (Phụ thu) - (Tiền cọc)
        $daThanhToanMoi = $tongTienGoc - $tienGiam + $phuThu - $tienCoc;

        // Kiểm tra xem admin có tự nhập số tiền thanh toán hay không
        $daThanhToan = $request->da_thanh_toan !== null
            ? (float) $request->da_thanh_toan  // Lấy số admin tự nhập
            : $daThanhToanMoi;                  // Lấy số vừa tính lại

        $hoaDon->update([
            // Bỏ 'dat_ban_id' khỏi update
            'tien_giam' => $tienGiam,
            'phu_thu' => $phuThu,
            'da_thanh_toan' => $daThanhToan,
            'phuong_thuc_tt' => $request->phuong_thuc_tt,
        ]);

        return redirect()->route('admin.hoa-don.index')
            ->with('success', 'Cập nhật hóa đơn thành công!');
    }

    /**
     * XÓA HÓA ĐƠN
     */
    public function destroy($id)
    {
        $hoaDon = HoaDon::findOrFail($id);
        
        // Cân nhắc: Khi xóa HĐ, có nên cập nhật lại trang_thai bàn thành 'hoan_tat'?
        // (Hiện tại code này chỉ xóa HĐ)
        
        $hoaDon->delete();

        return redirect()->route('admin.hoa-don.index')
            ->with('success', 'Xóa hóa đơn thành công!');
    }
}