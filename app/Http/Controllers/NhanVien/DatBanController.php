<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use App\Models\BanAn;
use App\Models\ComboBuffet;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DatBanController extends Controller
{
    public function index()
    {
        $ds = DatBan::with(['banAn', 'nhanVien', 'comboBuffet'])
            ->orderByDesc('id')
            ->get();

        return view('nhanvien.datban.index', compact('ds'));
    }

   public function create()
{
    // Lấy ID các bàn đang chờ xác nhận
    $datBanChoXacNhan = DatBan::where('trang_thai', 'cho_xac_nhan')
                              ->pluck('ban_id')
                              ->toArray();

    // Lấy các bàn trống và chưa có đặt bàn chờ xác nhận
    $bans = BanAn::where('trang_thai', 'trong')
                 ->whereNotIn('id', $datBanChoXacNhan)
                 ->get();

    $combos = ComboBuffet::all(); // nếu muốn chọn combo khi tạo bàn
   $nhanViens = NhanVien::where('trang_thai', 1)->get();

    return view('nhanvien.datban.create', compact('bans', 'combos','nhanViens'));
}
    public function store(Request $r)
    {
        $data = $r->validate([
            'ban_an_id' => 'required',
            'ten_khach' => 'required',
            'so_dien_thoai' => 'nullable',
            'so_luong' => 'required',
            'thoi_gian_den' => 'required',
            'combo_id' => 'nullable|integer'
        ]);
        $data['ma_dat_ban'] = 'DB-' . strtoupper(substr(uniqid(), -6));
        $data['sdt_khach'] = $r->so_dien_thoai ?? '';
        $data['trang_thai'] = 'cho_xac_nhan';
        $data['nhan_vien_id'] = $r->nhan_vien_id ?? auth()->id();
        $data['ban_id'] = $data['ban_an_id'];
        $data['so_khach'] = $data['so_luong'];
        $data['gio_den'] = $data['thoi_gian_den'];

        unset($data['ban_an_id'], $data['so_luong'], $data['thoi_gian_den']);

        DatBan::create($data);

        return redirect()->route('NhanVien.datban.index')->with('success', 'Tạo đặt bàn thành công!');
    }
    public function xacNhan($id)
    {
        // 1. Lấy bàn đã đặt kèm combo
        $datBan = DatBan::with('comboBuffet')->findOrFail($id);

        // 2. Tính tổng thời lượng combo (phút)
        $tongThoiLuong = $datBan->comboBuffet ? $datBan->comboBuffet->thoi_luong_phut : 0;

        // 3. Giờ đến
        $gioDen = Carbon::parse($datBan->gio_den);

        // 4. Giờ kết thúc theo combo
        $gioKetThuc = $gioDen->copy()->addMinutes($tongThoiLuong);

        // 5. Giờ đóng cửa (có thể đặt config)
        $gioDongCua = Carbon::parse('22:00');

        // 6. Kiểm tra nếu combo kết thúc sau giờ đóng cửa
        if ($gioKetThuc->gt($gioDongCua)) {
            return back()->with('error', 'Combo sẽ kết thúc sau giờ đóng cửa, không thể xác nhận!');
        }

        // 7. Gắn nhân viên xử lý và cập nhật trạng thái
        $datBan->nhan_vien_id = auth()->id(); // hoặc có thể lấy từ form nếu muốn chỉ định nhân viên
        $datBan->trang_thai = 'da_xac_nhan';
        $datBan->save();

        // 8. Cập nhật trạng thái bàn
        $ban = $datBan->banAn;
        if ($ban) {
            $ban->trang_thai = 'da_dat';
            $ban->save();
        }

        return back()->with('success', 'Đã xác nhận bàn thành công!');
    }
    public function huy($id)
    {
        $db = DatBan::findOrFail($id);
        $db->trang_thai = 'huy';
        $db->save();

        $ban = $db->banAn;
        $ban->trang_thai = 'trong';
        $ban->save();

        return back()->with('success', 'Đã hủy bàn!');
    }
}
