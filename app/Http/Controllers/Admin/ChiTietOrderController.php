<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietOrder;
use Illuminate\Http\Request;

class ChiTietOrderController extends Controller
{
    // Hiển thị danh sách chi tiết order
    public function index()
    {
        // Lấy danh sách chi tiết order cùng thông tin món ăn & order
        $chiTietOrders = ChiTietOrder::with(['mon', 'order'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admins.chi-tiet-order.index', compact('chiTietOrders'));
    }

    // Cập nhật ghi chú hoặc số lượng
    public function update(Request $request, $id)
    {
        $request->validate([
            'so_luong' => 'required|integer|min:1',
            'ghi_chu' => 'nullable|string|max:255',
        ]);

        $chiTiet = ChiTietOrder::findOrFail($id);
        $chiTiet->update([
            'so_luong' => $request->so_luong,
            'ghi_chu' => $request->ghi_chu,
        ]);

        return redirect()->route('admin.chi-tiet-order.index')->with('success', 'Cập nhật chi tiết order thành công!');
    }

    // Xóa món khỏi đơn
    public function destroy($id)
    {
        $chiTiet = ChiTietOrder::findOrFail($id);
        $chiTiet->delete();

        return redirect()->route('admin.chi-tiet-order.index')->with('success', 'Đã xóa món khỏi đơn!');
    }
}
