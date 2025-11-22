<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use App\Models\BanAn;
use App\Models\ComboBuffet;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatBanController extends Controller
{
    public function index(Request $r)
{
    $query = DatBan::with(['banAn', 'nhanVien', 'comboBuffet'])->select('dat_ban.*');

    if ($r->ma_dat_ban) {
        $query->where('ma_dat_ban', 'like', '%' . $r->ma_dat_ban . '%');
    }

    if ($r->ban) {
        $query->whereHas('banAn', function ($q) use ($r) {
            $q->where('so_ban', 'like', '%' . $r->ban . '%');
        });
    }

    if ($r->ten_khach) {
        $query->where('ten_khach', 'like', '%' . $r->ten_khach . '%');
    }

    if ($r->so_khach) {
        $query->where('so_khach', $r->so_khach);
    }

    if ($r->nhan_vien) {
        $query->whereHas('nhanVien', function ($q) use ($r) {
            $q->where('ho_ten', 'like', '%' . $r->nhan_vien . '%');
        });
    }

    if ($r->combo) {
        $query->whereHas('comboBuffet', function ($q) use ($r) {
            $q->where('ten_combo', 'like', '%' . $r->combo . '%');
        });
    }

    if ($r->trang_thai) {
        $query->where('trang_thai', $r->trang_thai);
    }

    $ds = $query->orderByDesc('id')->distinct()->get();

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
        $nhanViens = NhanVien::where('trang_thai', 1)
            ->where('vai_tro', 'le_tan')
            ->get();

        return view('nhanvien.datban.create', compact('bans', 'combos', 'nhanViens'));
    }
public function store(Request $r)
{
    $data = $r->validate([
        'ban_an_id' => 'required',
        'ten_khach' => 'required',
        'so_dien_thoai' => 'nullable',
        'so_luong' => 'required',
        'thoi_gian_den' => 'required',
        'combo_id' => 'nullable|integer',
        'ghi_chu' => 'nullable|string|max:500',
    ]);

    // Sinh mã đặt bàn
    do {
        $maDatBan = 'DB-' . Str::upper(substr(uniqid(), -6));
    } while (DatBan::where('ma_dat_ban', $maDatBan)->exists());

    $data['ma_dat_ban'] = $maDatBan;
    $data['sdt_khach'] = $r->so_dien_thoai ?? '';
    $data['nhan_vien_id'] = $r->nhan_vien_id ?? auth()->id();
    $data['ban_id'] = $data['ban_an_id'];
    $data['so_khach'] = $data['so_luong'];
    $data['gio_den'] = $data['thoi_gian_den'];

    // Thời lượng phút theo combo hoặc mặc định 120 phút
    if ($data['combo_id']) {
        $combo = ComboBuffet::find($data['combo_id']);
        $data['thoi_luong_phut'] = $combo ? $combo->thoi_luong_phut : 120;
    } else {
        $data['thoi_luong_phut'] = 120;
    }

    // Trạng thái mặc định là chờ xác nhận
    $data['trang_thai'] = 'cho_xac_nhan';
    unset($data['ban_an_id'], $data['so_luong'], $data['thoi_gian_den']);

    DatBan::create($data);

    // Update trạng thái bàn
    BanAn::find($data['ban_id'])->update(['trang_thai' => 'da_dat']);

    return redirect()->route('NhanVien.datban.index')->with('success', 'Tạo đặt bàn thành công!');
}
public function xacNhan($id)
{
    $datBan = DatBan::findOrFail($id);
    $datBan->trang_thai = 'da_xac_nhan';
    $datBan->gio_xac_nhan = now();
    $datBan->save(); // kiểm tra thật sự update

    $datBan->banAn->update(['trang_thai' => 'da_dat']);

    return back()->with('success','Đã xác nhận bàn thành công!');
}
public function khachDaDen($id)
{
    $datBan = DatBan::findOrFail($id);
    $datBan->trang_thai = 'khach_da_den';
    // Không gán lại gio_xac_nhan, giữ nguyên từ lúc xác nhận
    $datBan->save();

    $datBan->banAn->update(['trang_thai' => 'da_dat']);

    return back()->with('success', 'Khách đã đến và được nhận bàn!');
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
