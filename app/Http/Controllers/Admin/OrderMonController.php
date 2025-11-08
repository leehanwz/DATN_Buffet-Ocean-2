<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderMon;
use App\Models\MonAn;
use App\Models\DatBan;
use App\Models\BanAn;
use App\Models\ChiTietOrder;
use Illuminate\Http\Request;

class OrderMonController extends Controller
{
    public function index()
    {
        $orders = OrderMon::with(['datBan', 'banAn'])->latest()->paginate(10);
        return view('admins.order-mon.index', compact('orders'));
    }

    public function create()
    {
        $datBans = DatBan::with(['banAn', 'comboBuffet.monTrongCombo.monAn'])->get();
        $banAns = BanAn::all();
        return view('admins.order-mon.create', compact('datBans', 'banAns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id',
            'trang_thai' => 'required|in:dang_xu_li,hoan_thanh,huy_mon',
        ]);

        $datBan = DatBan::with('comboBuffet.monTrongCombo.monAn')->findOrFail($request->dat_ban_id);

        // --- Lấy thông tin từ đặt bàn ---
        $giaCombo = $datBan->comboBuffet?->gia_co_ban ?? 0;
        $soKhach  = $datBan->so_khach ?? 0;
        $giamGia  = $datBan->giam_gia ?? 0;

        $order = OrderMon::create([
            'dat_ban_id' => $datBan->id,
            'ban_id' => $datBan->ban_id,
            'tong_mon' => $datBan->so_khach ?? 0, // 🔥 Lấy tự động từ đặt bàn
            'tong_tien' => ($datBan->comboBuffet?->gia_co_ban ?? 0) * ($datBan->so_khach ?? 0), // Tính sẵn tiền combo
            'trang_thai' => 'dang_xu_li',
        ]);
        // Khởi tạo các biến tính toán
        $tongMon = 0; // giữ mặc định từ đặt bàn
        $tongTienGoiThem = 0;
        $tongPhuPhiVuot = 0;

        // Nếu có danh sách món từ form
        // ✅ 1. Cộng trước số món trong combo
        if ($datBan->comboBuffet && $datBan->comboBuffet->monTrongCombo) {
            foreach ($datBan->comboBuffet->monTrongCombo as $monCombo) {
                $soLuongCombo = $monCombo->so_luong ?? 1;
                $tongMon += $soLuongCombo;

                ChiTietOrder::create([
                    'order_id' => $order->id,
                    'mon_an_id' => $monCombo->monAn->id,
                    'so_luong' => $soLuongCombo,
                    'loai_mon' => 'combo',
                    'trang_thai' => 'cho_bep',
                ]);
            }
        }

        // ✅ 2. Sau đó cộng thêm món khách gọi ngoài combo
        if ($request->filled('mon') && is_array($request->mon)) {
            foreach ($request->mon as $mon) {
                $monAn = MonAn::find($mon['mon_an_id']);
                if (!$monAn) continue;

                $soLuong = (int) $mon['so_luong'];
                $loaiMon = $mon['loai_mon'] ?? 'goi_them';
                $tongMon += $soLuong;

                ChiTietOrder::create([
                    'order_id' => $order->id,
                    'mon_an_id' => $monAn->id,
                    'so_luong' => $soLuong,
                    'loai_mon' => $loaiMon,
                    'trang_thai' => 'cho_bep',
                ]);


                // Tính tiền gọi thêm
                if ($loaiMon === 'goi_them') {
                    $tongTienGoiThem += $monAn->gia * $soLuong;
                }

                // Tính phụ phí món vượt (nếu combo vượt giới hạn)
                if ($loaiMon === 'combo') {
                    $gioiHan = $monAn->gioi_han ?? 0;
                    $phuPhi  = $monAn->phu_phi ?? 0;

                    if ($soLuong > $gioiHan) {
                        $tongPhuPhiVuot += ($soLuong - $gioiHan) * $phuPhi;
                    }
                }
            }
        }

        // 👉 Tính tổng tiền cuối cùng
        $tongTien = ($giaCombo * $soKhach) + $tongTienGoiThem + $tongPhuPhiVuot - $giamGia;

        // 👉 Cập nhật lại order
        $order->update([
            'tong_mon'  => $tongMon,
            'tong_tien' => $tongTien,
        ]);

        return redirect()->route('admin.order-mon.index')->with('success', 'Tạo order món thành công!');
    }

    public function edit(OrderMon $orderMon)
    {
        $datBans = DatBan::with('banAn')->get();
        $banAns = BanAn::all();

        $allowedStatus = match ($orderMon->trang_thai) {
            'dang_xu_ly' => [
                'dang_xu_li' => 'Đang xử lý',
                'huy_mon'    => 'Hủy món',
                'hoan_thanh' => 'Hoàn thành',
            ],
            'hoan_thanh' => ['hoan_thanh' => 'Hoàn thành'],
            'huy_mon'    => ['huy_mon' => 'Hủy món'],
            default => [
                'dang_xu_li' => 'Đang xử lý',
                'hoan_thanh' => 'Hoàn thành',
                'huy_mon'    => 'Hủy món',
            ],
        };

        return view('admins.order-mon.edit', compact('orderMon', 'datBans', 'banAns', 'allowedStatus'));
    }

    public function update(Request $request, OrderMon $orderMon)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id',
            'trang_thai' => 'required|in:dang_xu_li,hoan_thanh,huy_mon',
            'tong_mon' => 'nullable|integer|min:0',
            'tong_tien' => 'nullable|numeric|min:0',
        ]);

        $datBan = DatBan::findOrFail($request->dat_ban_id);

        $orderMon->update([
            'dat_ban_id' => $datBan->id,
            'ban_id' => $datBan->ban_id,
            'tong_mon' => $request->input('tong_mon', $orderMon->tong_mon),
            'tong_tien' => $request->input('tong_tien', $orderMon->tong_tien),
            'trang_thai' => $request->trang_thai,
        ]);

        return redirect()->route('admin.order-mon.index')->with('success', 'Cập nhật Order món thành công!');
    }

    public function destroy(OrderMon $orderMon)
    {
        $orderMon->delete();
        return redirect()->route('admin.order-mon.index')->with('success', 'Xóa Order món thành công!');
    }
}
