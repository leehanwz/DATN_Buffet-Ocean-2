<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderMon;
use App\Models\DatBan;
use App\Models\BanAn;
use Illuminate\Http\Request;

class OrderMonController extends Controller
{
    // Index: eager-load quan hệ và trả view
    public function index()
    {
        $orders = OrderMon::with(['datBan', 'banAn'])->latest()->paginate(10);
        return view('admins.order-mon.index', compact('orders'));
    }

    // Create: truyền cả datBans (có relation banAn) và danh sách banAns (nếu view cần)
    public function create()
    {
        // Lấy datBans kèm relation banAn để có thể show thông tin bàn khi chọn đặt bàn
        $datBans = DatBan::with(['banAn', 'comboBuffet.monTrongCombo.monAn'])->get();

        // Nếu view vẫn cần 1 danh sách bàn độc lập (ví dụ để filter), trả luôn:
        $banAns = BanAn::all();

        return view('admins.order-mon.create', compact('datBans', 'banAns'));
    }

    // Store: hợp lý hoá — ưu tiên lấy ban_id từ DatBan đã chọn (tránh người dùng nhập sai)
    public function store(Request $request)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id',
            'trang_thai' => 'required|in:cho_bep,dang_che_bien,da_len_mon,huy_mon',
        ]);

        // Lấy thông tin đặt bàn (có combo + món trong combo)
        $datBan = DatBan::with('comboBuffet.monTrongCombo.monAn')->findOrFail($request->dat_ban_id);

        // Tính tổng món (số món trong combo)
        $tongMon = $datBan->comboBuffet?->monTrongCombo?->count() ?? 0;

        // Tính tổng phụ phí các món trong combo
        $tongPhuPhi = $datBan->comboBuffet?->monTrongCombo?->sum('phu_phi_goi_them') ?? 0;

        // Giá combo cơ bản
        $giaCombo = $datBan->comboBuffet?->gia_co_ban ?? 0;

        // Số khách
        $soKhach = $datBan->so_khach ?? 0;

        // 👉 CÔNG THỨC TÍNH TỔNG TIỀN:
        // Nếu phụ phí tính riêng theo bàn
        $tongTien = ($giaCombo * $soKhach) + $tongPhuPhi;

        // Nếu phụ phí tính theo đầu người (ít gặp hơn), đổi thành:
        // $tongTien = ($giaCombo + $tongPhuPhi) * $soKhach;

        // Tạo mới order món
        $order = OrderMon::create([
            'dat_ban_id' => $datBan->id,
            'ban_id' => $datBan->ban_id,
            'tong_mon' => $tongMon,
            'tong_tien' => $tongTien,
            'trang_thai' => 'cho_bep',
        ]);

        // --- THÊM CÁC MÓN VÀO CHI TIẾT ORDER ---
        if ($datBan->comboBuffet && $datBan->comboBuffet->monTrongCombo->isNotEmpty()) {

            $chitietData = [];
            $now = now();

            foreach ($datBan->comboBuffet->monTrongCombo as $ItemTrongCombo) {
                $monAnModel = $ItemTrongCombo->monAn;

                if (!$monAnModel) {
                    continue; // Bỏ qua nếu món ăn không tồn tại
                }

                $chitietData[] = [
                    'order_id' => $order->id,
                    'mon_an_id' => $monAnModel->id,
                    'so_luong' => 1, // Mặc định 1 món trong combo
                    'don_gia' => $monAnModel->gia,
                    'trang_thai' => 'cho_bep',
                    'ghi_chu' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            if (!empty($chitietData)) {
                \App\Models\ChiTietOrder::insert($chitietData);
            }
        }

        return redirect()->route('admin.order-mon.index')->with('success', 'Tạo Order món thành công!');
    }

    // Edit: truyền cả datBans và banAns để view có thể show dropdown hoặc auto-fill
    public function edit(OrderMon $orderMon)
    {
        $datBans = DatBan::with('banAn')->get();
        $banAns = BanAn::all();
        $allowedStatus = match ($orderMon->trang_thai) {
            'cho_bep' => ['dang_che_bien' => 'Đang chế biến'],
            'dang_che_bien' => ['da_len_mon' => 'Đã lên món', 'huy_mon' => 'Hủy món'],
            'da_len_mon' => ['da_len_mon' => 'Đã lên món'], // đã xong thì không đổi nữa
            'huy_mon' => ['huy_mon' => 'Hủy món'], // không đổi nữa
            default => ['cho_bep' => 'Chờ bếp'],
        };
        return view('admins.order-mon.edit', compact('orderMon', 'datBans', 'banAns', 'allowedStatus'));
    }

    // Update: tương tự store
    public function update(Request $request, OrderMon $orderMon)
    {
        $request->validate([
            'dat_ban_id' => 'required|exists:dat_ban,id',
            'trang_thai' => 'required|in:cho_bep,dang_che_bien,da_len_mon,huy_mon',
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

    // Destroy
    public function destroy(OrderMon $orderMon)
    {
        $orderMon->delete();
        return redirect()->route('admin.order-mon.index')->with('success', 'Xóa Order món thành công!');
    }
}
