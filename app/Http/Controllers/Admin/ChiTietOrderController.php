<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietOrder;
use App\Models\OrderMon;
use App\Models\MonAn;
use Illuminate\Http\Request;

class ChiTietOrderController extends Controller
{
    public function create(OrderMon $order)
    {
        $monAns = MonAn::all(); // danh sách món
        return view('admins.chi-tiet-order.create', compact('order', 'monAns'));
    }

    public function store(Request $request, OrderMon $order)
    {
        $request->validate([
            'mon_an_id' => 'required|exists:mon_an,id',
            'so_luong'  => 'required|integer|min:1',
            'loai_mon'  => 'required|in:combo,goi_them',
        ]);

        $chiTiet = ChiTietOrder::create([
            'order_id'   => $order->id,
            'mon_an_id'  => $request->mon_an_id,
            'so_luong'   => $request->so_luong,
            'loai_mon'   => $request->loai_mon,
            'trang_thai' => 'cho_bep',
        ]);

        // cập nhật tổng tiền order
        $order->tong_mon += $request->so_luong;
        $order->tong_tien += $this->tinhTienMon($chiTiet);
        $order->save();

        return redirect()->route('admin.order-mon.edit', $order->id)
                         ->with('success', 'Thêm món thành công!');
    }

    protected function tinhTienMon(ChiTietOrder $chiTiet)
    {
        $mon = $chiTiet->monAn;
        if ($chiTiet->loai_mon === 'combo') {
            $gioiHan = $mon->gioi_han ?? 0;
            $phuPhi  = $mon->phu_phi ?? 0;
            return $chiTiet->so_luong > $gioiHan ? ($chiTiet->so_luong - $gioiHan) * $phuPhi : 0;
        } else { // goi_them
            return $mon->gia * $chiTiet->so_luong;
        }
    }

    public function destroy(ChiTietOrder $chiTiet)
    {
        $order = $chiTiet->order;
        // trừ tiền và tổng món trước khi xóa
        $order->tong_mon -= $chiTiet->so_luong;
        $order->tong_tien -= $this->tinhTienMon($chiTiet);
        $order->save();

        $chiTiet->delete();
        return redirect()->back()->with('success', 'Xóa món thành công!');
    }
}
