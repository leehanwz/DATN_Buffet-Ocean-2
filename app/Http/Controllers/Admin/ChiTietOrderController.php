<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietOrder;
use App\Models\OrderMon;
use App\Models\MonTrongCombo;
use App\Models\MonAn;
use Illuminate\Http\Request;

class ChiTietOrderController extends Controller
{
    // Hiển thị danh sách món trong 1 đơn hàng
    public function index(Request $request)
    {
        $orderId = $request->query('order_id');

        // Nếu có order_id → xem chi tiết đơn cụ thể
        if ($orderId) {
            $order = OrderMon::with(['chiTietOrders.monAn', 'datBan'])->find($orderId);

            if (!$order) {
                return redirect()->route('admin.chi-tiet-order.index')
                    ->with('error', 'Đơn hàng không tồn tại.');
            }

            $monAns = MonAn::where('trang_thai', 'dang_ban')->get();

            // ✅ Lấy combo_id từ dat_ban
            $comboId = $order->datBan->combo_id ?? null;
            $soLuongMonTrongCombo = [];

            if ($comboId) {
                $monTrongCombo = MonTrongCombo::where('combo_id', $comboId)->get();
                $soLuongMonTrongCombo = $monTrongCombo->pluck('gioi_han_so_luong', 'mon_an_id')->toArray();
            }

            // ✅ Xác định loại món (combo / gọi thêm)
            foreach ($order->chiTietOrders as $ct) {
                if (array_key_exists($ct->mon_an_id, $soLuongMonTrongCombo)) {
                    $ct->loai_mon = 'Combo';
                } else {
                    $ct->loai_mon = 'Gọi thêm';
                }
            }

            return view('admins.chi-tiet-order.show', compact('order', 'monAns', 'soLuongMonTrongCombo'));
        }

        // Nếu KHÔNG có order_id → hiển thị danh sách tất cả đơn
        $orders = OrderMon::latest()->paginate(10);

        // ✅ Nếu bạn muốn hiển thị combo chọn món ngay tại trang index, giữ dòng dưới
        $monAns = MonAn::where('trang_thai', 'dang_ban')->get();

        return view('admins.chi-tiet-order.index', compact('orders', 'monAns'));
    }

    public function show($id)
    {
        // Lấy order + chi tiết món + bàn
        $order = OrderMon::with(['datBan', 'chiTietOrders.monAn'])->findOrFail($id);

        // Lấy combo_id từ dat_ban
        $comboId = $order->datBan->combo_id ?? null;
        $soLuongMonTrongCombo = [];

        if ($comboId) {
            $monTrongCombo = MonTrongCombo::where('combo_id', $comboId)->get();
            // Mỗi món trong combo lấy số lượng mặc định
            $soLuongMonTrongCombo = $monTrongCombo->pluck('gioi_han_so_luong', 'mon_an_id')->toArray();
        }

        // ✅ Gắn loại món
        foreach ($order->chiTietOrders as $ct) {
            if (array_key_exists($ct->mon_an_id, $soLuongMonTrongCombo)) {
                $ct->loai_mon = 'Combo';
            } else {
                $ct->loai_mon = 'Gọi thêm';
            }
        }

        return view('admins.chi-tiet-order.show', [
            'order' => $order,
            'soLuongMonTrongCombo' => $soLuongMonTrongCombo,
        ]);
    }
    public function edit($id)
    {
        // Load cả OrderMon cha để hiển thị thông tin context
        $chiTiet = ChiTietOrder::with('orderMon')->findOrFail($id);

        return view('admins.chi-tiet-order.edit', compact('chiTiet'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:order_mon,id',
            'mon_an_id' => 'required|exists:mon_an,id',
            'so_luong' => 'required|integer|min:1',
        ]);

        ChiTietOrder::create([
            'order_id' => $request->order_id,
            'mon_an_id' => $request->mon_an_id,
            'so_luong' => $request->so_luong,
            'ghi_chu' => $request->ghi_chu,
            'loai_mon' => 'goi_them', // mặc định khi thêm thủ công
            'trang_thai' => 'cho_bep',
        ]);

        return redirect()->route('admin.chi-tiet-order.index', ['order_id' => $request->order_id])
            ->with('success', 'Đã thêm món vào đơn hàng thành công!');
    }

    public function create(Request $request)
    {
        $orderId = $request->query('order_id');

        // Kiểm tra đơn hàng có tồn tại không
        $order = \App\Models\OrderMon::with(['chiTietOrders.monAn'])->find($orderId);
        if (!$order) {
            return redirect()->route('admin.chi-tiet-order.index')
                ->with('error', 'Không tìm thấy đơn hàng.');
        }

        // ✅ Lấy danh sách món ăn đang bán
        $monAns = \App\Models\MonAn::where('trang_thai', 'an')->get();

        return view('admins.chi-tiet-order.create', compact('order', 'monAns'));
    }

    // Cập nhật số lượng hoặc ghi chú món ăn
public function update(Request $request, $id)
{
    $ct = ChiTietOrder::findOrFail($id);

    $request->validate([
        'trang_thai' => 'required|string|in:cho_bep,dang_che_bien,da_len_mon,huy_mon,hoan_thanh',
        'ghi_chu' => 'nullable|string|max:255',
    ]);

    $trangThaiCu = $ct->trang_thai;
    $trangThaiMoi = $request->input('trang_thai');

    // Quy tắc chuyển trạng thái
    $quyTac = [
        'cho_bep' => ['dang_che_bien', 'huy_mon'],
        'dang_che_bien' => ['da_len_mon', 'huy_mon'],
        'da_len_mon' => ['hoan_thanh'],
        'huy_mon' => [],
        'hoan_thanh' => [],
    ];

    if (!in_array($trangThaiMoi, $quyTac[$trangThaiCu] ?? [])) {
        return redirect()->back()->with('error', 'Không thể chuyển từ trạng thái "' . $trangThaiCu . '" sang "' . $trangThaiMoi . '".');
    }

    // Cập nhật trạng thái + ghi chú
    $ct->update([
        'trang_thai' => $trangThaiMoi,
        'ghi_chu' => trim($request->input('ghi_chu')),
    ]);

    // Nếu tất cả món đạt da_len_mon, tự động set order sang hoan_thanh
    $orderMon = $ct->orderMon;
    if ($orderMon->chiTietOrders->every(fn($m) => $m->trang_thai === 'da_len_mon')) {
        $orderMon->update(['trang_thai' => 'hoan_thanh']);
    }

    return redirect()->route('admin.chi-tiet-order.index', ['order_id' => $ct->order_id])
        ->with('success', 'Cập nhật trạng thái thành công.');
}
    // Xóa món khỏi đơn hàng
    public function destroy($id)
    {
        $ct = ChiTietOrder::findOrFail($id);
        $orderMon = $ct->orderMon; // Lấy OrderMon trước khi xóa

        // Xóa ChiTietOrder
        $ct->delete();

        // Tái tính toán tổng tiền của đơn hàng cha
        if ($orderMon) {
            $orderMon->recalculateTotal();
        }

        // Chuyển hướng về trang chi tiết đơn hàng
        return redirect()->route('admin.chi-tiet-order.index', ['order_id' => $orderMon->id])
            ->with('success', 'Đã xóa món khỏi đơn hàng và cập nhật tổng tiền.');
    }

    public function themMon(Request $request, $id)
    {
        $request->validate([
            'mon_an_id' => 'required|exists:mon_an,id',
            'so_luong' => 'required|integer|min:1',
        ]);

        ChiTietOrder::create([
            'order_id' => $id,
            'mon_an_id' => $request->mon_an_id,
            'so_luong' => $request->so_luong,
            'ghi_chu' => $request->ghi_chu ?? null,
            'loai_mon' => 'goi_them',
            'trang_thai' => 'cho_bep',
        ]);

        return redirect()->back()->with('success', 'Đã thêm món mới vào order.');
    }
}
