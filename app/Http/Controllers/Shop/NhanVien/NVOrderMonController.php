<?php

namespace App\Http\Controllers\Shop\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\OrderMon;
use App\Models\ChiTietOrder;
use App\Models\MonAn;
use App\Models\BanAn;
use Illuminate\Http\Request;

class NVOrderMonController extends Controller
{
    public function index($banId)
    {
        $ban = BanAn::findOrFail($banId);

        $order = OrderMon::where('ban_an_id', $banId)
            ->where('trang_thai', 'dang_phuc_vu')
            ->first();

        $monAn = MonAn::orderBy('ten_mon')->get();

        return view('nhanvien.order.index', compact('ban', 'order', 'monAn'));
    }

    public function open($banId)
    {
        OrderMon::create([
            'ban_an_id' => $banId,
            'nhan_vien_id' => auth()->id(),
            'tong_mon' => 0,
            'trang_thai' => 'dang_phuc_vu',
        ]);

        $ban = BanAn::find($banId);
        $ban->trang_thai = 'dang_phuc_vu';
        $ban->save();

        return back();
    }

    public function add(Request $r, $orderId)
    {
        ChiTietOrder::create([
            'order_id' => $orderId,
            'mon_an_id' => $r->mon_an_id,
            'so_luong' => $r->so_luong,
            'ghi_chu' => $r->ghi_chu,
            'trang_thai' => 'cho_bep',
        ]);

        return back();
    }

    public function update(Request $r, $orderId)
    {
        $ct = ChiTietOrder::findOrFail($r->id);
        $ct->so_luong = $r->so_luong;
        $ct->ghi_chu = $r->ghi_chu;
        $ct->save();

        return back();
    }

    public function delete(Request $r, $orderId)
    {
        ChiTietOrder::where('id', $r->id)->delete();
        return back();
    }

    public function sendKitchen($orderId)
    {
        ChiTietOrder::where('order_id', $orderId)
            ->update(['trang_thai' => 'cho_bep']);

        return back();
    }
}
