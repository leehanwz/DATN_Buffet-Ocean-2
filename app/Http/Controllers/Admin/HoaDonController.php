<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\DatBan;

class HoaDonController extends Controller
{
    public function index()
    {
        $hoadons = HoaDon::with(['datBan.banAn', 'orderMons.mon'])->latest()->get();
        return view('admins.hoa-don.index', compact('hoadons'));
    }

    public function create()
    {
        $datBans = DatBan::where('trang_thai', 'hoan_tat')->get();
        return view('admins.hoa-don.create', compact('datBans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id',
            'phuong_thuc_tt' => 'required|string',
            'tien_giam' => 'nullable|numeric|min:0',
            'phu_thu' => 'nullable|numeric|min:0',
        ]);

        $datBan = DatBan::with('orderMons.mon', 'banAn')->findOrFail($request->dat_ban_id);

        // Tạo hóa đơn
        $hoaDon = HoaDon::create([
            'dat_ban_id' => $datBan->id,
            'tien_giam' => (float) ($request->tien_giam ?? 0),
            'phu_thu' => (float) ($request->phu_thu ?? 0),
            'phuong_thuc_tt' => $request->phuong_thuc_tt,
        ]);

        // Gán tất cả order chưa có hoa_don_id vào hóa đơn
        $datBan->orderMons()->whereNull('hoa_don_id')->update(['hoa_don_id' => $hoaDon->id]);

        // Reload relation orderMons để tính tổng tiền chính xác
        $hoaDon->load('orderMons');

        // Cập nhật tổng tiền và đã thanh toán
        $hoaDon->update([
            'tong_tien' => $hoaDon->tinhTongTien(),
            'da_thanh_toan' => $hoaDon->tinhDaThanhToan(),
        ]);

        // Cập nhật trạng thái bàn về "trống"
        if ($datBan->banAn) {
            $datBan->banAn->update(['trang_thai' => 'trong']);
        }

        return redirect()->route('admin.hoa-don.index')
            ->with('success', 'Tạo hóa đơn thành công!');
    }

    public function show($id)
    {
        $hoaDon = HoaDon::with(['datBan.banAn', 'orderMons.mon'])->findOrFail($id);
        return view('admins.hoa-don.show', compact('hoaDon'));
    }

    public function edit($id)
    {
        $hoaDon = HoaDon::findOrFail($id);
        $datBans = DatBan::where('trang_thai', 'hoan_tat')->get();
        return view('admins.hoa-don.edit', compact('hoaDon', 'datBans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id',
            'phuong_thuc_tt' => 'required|string',
            'tien_giam' => 'nullable|numeric|min:0',
            'phu_thu' => 'nullable|numeric|min:0',
            'da_thanh_toan' => 'nullable|numeric|min:0',
        ]);

        $hoaDon = HoaDon::findOrFail($id);

        $tienGiam = (float) ($request->tien_giam ?? 0);
        $phuThu = (float) ($request->phu_thu ?? 0);
        $daThanhToan = $request->da_thanh_toan !== null
            ? (float) $request->da_thanh_toan
            : $hoaDon->tinhDaThanhToan();

        $hoaDon->update([
            'dat_ban_id' => $request->dat_ban_id,
            'tien_giam' => $tienGiam,
            'phu_thu' => $phuThu,
            'da_thanh_toan' => $daThanhToan,
            'phuong_thuc_tt' => $request->phuong_thuc_tt,
        ]);

        return redirect()->route('admin.hoa-don.index')
            ->with('success', 'Cập nhật hóa đơn thành công!');
    }

    public function destroy($id)
    {
        $hoaDon = HoaDon::findOrFail($id);
        $hoaDon->delete();

        return redirect()->route('admin.hoa-don.index')
            ->with('success', 'Xóa hóa đơn thành công!');
    }
}
