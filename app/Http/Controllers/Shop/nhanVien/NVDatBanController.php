<?php

namespace App\Http\Controllers\Shop\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use App\Models\BanAn;
use App\Models\ComboBuffet;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NVDatBanController extends Controller
{
    public function index(Request $r)
    {
        $query = DatBan::with(['banAn', 'nhanVien', 'comboBuffet'])->select('dat_ban.*');
         $ds = DatBan::with(['banAn', 'nhanVien', 'comboBuffet'])
        ->orderByDesc('id')
        ->get();
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

        // Tính thời gian còn lại cho từng đặt bàn
        $ds->transform(function ($d) {
            $d->thoiGianConLaiPhut = null;
            if ($d->gio_den && $d->thoi_luong_phut) {
                $gioKetThuc = Carbon::parse($d->gio_den)->addMinutes($d->thoi_luong_phut);
                $d->thoiGianConLaiPhut = $gioKetThuc->isFuture() ? $gioKetThuc->diffInMinutes(now()) : 0;
            }
            return $d;
        });

        return view('shop.nhanvien.datban.index', compact('ds'));
    }

    public function create()
    {
        $datBanChoXacNhan = DatBan::where('trang_thai', 'cho_xac_nhan')
            ->pluck('ban_id')
            ->toArray();

        $bans = BanAn::where('trang_thai', 'trong')
            ->whereNotIn('id', $datBanChoXacNhan)
            ->get();

        $combos = ComboBuffet::all();
        $nhanViens = NhanVien::where('trang_thai', 1)
            ->where('vai_tro', 'le_tan')
            ->get();

        return view('shop.nhanvien.datban.create', compact('bans', 'combos', 'nhanViens'));
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
        $data['trang_thai'] = 'khach_da_den';
        unset($data['ban_an_id'], $data['so_luong'], $data['thoi_gian_den']);
        if ($data['combo_id']) {
            $combo = ComboBuffet::find($data['combo_id']);
            $data['thoi_luong_phut'] = $combo ? $combo->thoi_luong_phut : 120;
        } else {
            $data['thoi_luong_phut'] = 120;
        }
        DatBan::create($data);

        BanAn::find($data['ban_id'])->update(['trang_thai' => 'da_dat']);

        return redirect()->route('NhanVien.datban.index')->with('success', 'Tạo đặt bàn thành công!');
    }
    public function xacNhan($id)
    {
        $datBan = DatBan::findOrFail($id);
        $datBan->trang_thai = 'da_xac_nhan';
        $datBan->save();

        $datBan->banAn->update(['trang_thai' => 'da_dat']);

        return back()->with('success', 'Đã xác nhận bàn thành công!');
    }

    public function khachDaDen($id)
    {
        $datBan = DatBan::findOrFail($id);
        $datBan->trang_thai = 'khach_da_den';
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
    public function thayDoiTrangThai(Request $request, $id)
{
    $datBan = DatBan::findOrFail($id);

    if ($request->has('trang_thai')) {
        $datBan->trang_thai = $request->trang_thai;
        $datBan->save();

        // Cập nhật trạng thái bàn
        if ($datBan->banAn) {
            $datBan->banAn->update(['trang_thai' => 'da_dat']);
        }

        return back()->with('success', 'Cập nhật trạng thái thành công!');
    }

    return back()->with('error', 'Không có trạng thái để cập nhật!');
}
public function khachDaDenAjax(Request $request, $id)
{
    $datBan = DatBan::findOrFail($id);

    // Cập nhật trạng thái trực tiếp, không cần start_time
    $datBan->trang_thai = 'khach_da_den';
    $datBan->save();

    return response()->json([
        'success' => true,
        'minutes' => $datBan->comboBuffet ? $datBan->comboBuffet->thoi_luong_phut : 120
    ]);
}
}
