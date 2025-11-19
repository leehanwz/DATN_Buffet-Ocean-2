<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\ChiTietOrder;
use App\Models\OrderMon;
use App\Models\MonTrongCombo;
use App\Models\MonAn;
use App\Models\BanAn;
use Illuminate\Http\Request;

class NhanVienOrderMonController extends Controller
{
    // Trang danh sách bàn
    public function index()
    {
        $bans = BanAn::with('khuVuc')->get();
        $orders = OrderMon::where('trang_thai', 'dang_xu_li')->get()->keyBy('ban_id');

        return view('nhanvien.order.index', compact('bans', 'orders'));
    }

    // Hiển thị chi tiết 1 order
    public function show($orderId)
    {
        $order = OrderMon::with(['chiTietOrders.monAn', 'datBan.comboBuffet'])
            ->findOrFail($orderId);

        $monAns = MonAn::where('trang_thai', 'dang_ban')->get();

        return view('nhanvien.chi-tiet-order.show', compact('order', 'monAns'));
    }

    // Mở order cho bàn đang hoạt động
    public function moOrder(Request $request)
    {
        $banId = $request->input('ban_id');
        $datBanId = $request->input('dat_ban_id') ?? null;

        $order = OrderMon::where('ban_id', $banId)->latest()->first();

        if (!$order) {
            $order = OrderMon::create([
                'ban_id' => $banId,
                'dat_ban_id' => $datBanId,
                'tong_mon' => 0,
                'tong_tien' => 0,
                'trang_thai' => 'dang_xu_li',
            ]);

            return response()->json([
                'success' => true,
                'order' => $order,
                'mode' => 'tao_moi'
            ]);
        }

        if ($order->trang_thai === 'dang_xu_li') {
            return response()->json([
                'success' => true,
                'order' => $order,
                'mode' => 'tiep_tuc_order'
            ]);
        }

        return response()->json([
            'success' => true,
            'order' => $order,
            'mode' => 'chi_xem'
        ]);
    }

    public function edit($orderId, $ctId)
    {
        $order = OrderMon::with('chiTietOrders.monAn')
            ->findOrFail($orderId);

        $ct = ChiTietOrder::findOrFail($ctId);

        return view('nhanvien.chi-tiet-order.edit', compact('order', 'ct'));
    }

    // Thêm món
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'mon_an_id' => 'required',
            'so_luong' => 'required|integer|min:1'
        ]);

        ChiTietOrder::create([
            'order_id' => $request->order_id,
            'mon_an_id' => $request->mon_an_id,
            'so_luong' => $request->so_luong,
            'loai_mon' => 'goi_them',
            'ghi_chu' => $request->ghi_chu,
            'trang_thai' => 'cho_bep'
        ]);

        return back()->with('success', 'Đã thêm món!');
    }

    // Sửa món
    public function update(Request $request, $id)
    {
        $ct = ChiTietOrder::findOrFail($id);
        $ct->update([
            'so_luong' => $request->so_luong,
            'ghi_chu' => $request->ghi_chu
        ]);

        return redirect()->route('nhanvien.chi-tiet-order.show', $ct->order_id)
            ->with('success', 'Cập nhật thành công!');
    }

    // Xóa món
    public function destroy($id)
    {
        $ct = ChiTietOrder::findOrFail($id);
        $ct->delete();

        return back()->with('success', 'Đã xóa món!');
    }
}
