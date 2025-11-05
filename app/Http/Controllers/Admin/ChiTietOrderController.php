<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietOrder;
use App\Models\OrderMon;
use Illuminate\Http\Request;

class ChiTietOrderController extends Controller
{
    // Hiển thị danh sách món trong 1 đơn hàng
    public function index(Request $request)
    {
        $orderId = $request->query('order_id');

        // Nếu có order_id → xem chi tiết đơn cụ thể
        if ($orderId) {
            $order = OrderMon::with(['chiTietOrders.monAn'])->find($orderId);

            if (!$order) {
                return redirect()->route('admin.chi-tiet-order.index')
                    ->with('error', 'Đơn hàng không tồn tại.');
            }

            return view('admins.chi-tiet-order.show', compact('order'));
        }

        // Nếu KHÔNG có order_id → hiển thị danh sách tất cả đơn
        $orders = OrderMon::latest()->paginate(10);
        return view('admins.chi-tiet-order.index', compact('orders'));
    }

    public function edit($id)
    {
        // Load cả OrderMon cha để hiển thị thông tin context
        $chiTiet = ChiTietOrder::with('orderMon')->findOrFail($id);

        return view('admins.chi-tiet-order.edit', compact('chiTiet'));
    }

    // Cập nhật số lượng hoặc ghi chú món ăn
    public function update(Request $request, $id)
    {
        $request->validate([
            'so_luong' => 'required|integer|min:1',
            'ghi_chu' => 'nullable|string|max:255',
        ]);

        $ct = ChiTietOrder::findOrFail($id);
        $ct->update([
            'so_luong' => $request->so_luong,
            'ghi_chu' => $request->ghi_chu,
        ]);

        $ct->orderMon->recalculateTotal(); // Cập nhật lại tổng tiền đơn hàng

        return redirect()->route('admin.chi-tiet-order.index', ['order_id' => $ct->orderMon->id])
            ->with('success', 'Cập nhật chi tiết món ăn thành công.');
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
}
