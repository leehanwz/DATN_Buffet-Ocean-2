<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatBan;
use App\Models\BanAn;
use App\Models\ComboBuffet;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DatBanController extends Controller
{
    public function index()
    {
        $dsDatBan = DatBan::with(['banAn', 'comboBuffet', 'nhanVien'])
            ->orderByDesc('id')
            ->paginate(10);

        return view('admins.dat-ban.index', compact('dsDatBan'));
    }

    public function create()
    {
        $banAns = BanAn::where('trang_thai', '!=', 'khong_su_dung')->get();
        $combos = ComboBuffet::where('trang_thai', 'dang_ban')->get();
        $nhanViens = NhanVien::all();

        return view('admins.dat-ban.create', compact('banAns', 'combos', 'nhanViens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_khach' => 'required|string|max:255',
            'sdt_khach' => 'required|string|max:15',
            'so_khach' => 'required|integer|min:1',
            'ban_id' => 'required|exists:ban_an,id',
            'combo_id' => 'nullable|exists:combo_buffet,id',
            'nhan_vien_id' => 'nullable|exists:nhan_vien,id',
            'gio_den' => 'nullable|date',
            'thoi_luong_phut' => 'nullable|integer|min:15',
            'tien_coc' => 'nullable|numeric|min:0',
        ]);

        $maDatBan = 'DB' . strtoupper(Str::random(8));

        DatBan::create([
            'ma_dat_ban' => $maDatBan,
            'ten_khach' => $request->ten_khach,
            'sdt_khach' => $request->sdt_khach,
            'so_khach' => $request->so_khach,
            'ban_id' => $request->ban_id,
            'combo_id' => $request->combo_id,
            'nhan_vien_id' => $request->nhan_vien_id,
            'gio_den' => $request->gio_den,
            'thoi_luong_phut' => $request->thoi_luong_phut,
            'tien_coc' => $request->tien_coc,
            'trang_thai' => 'cho_xac_nhan',
            'la_dat_online' => $request->boolean('la_dat_online'),
            'ghi_chu' => $request->ghi_chu,
        ]);

        return redirect()->route('admin.dat-ban.index')->with('success', 'Thêm đặt bàn thành công!');
    }

    public function edit($id)
    {
        $datBan = DatBan::findOrFail($id);
        $banAns = BanAn::all();
        $combos = ComboBuffet::all();
        $nhanViens = NhanVien::all();

        return view('admins.dat-ban.edit', compact('datBan', 'banAns', 'combos', 'nhanViens'));
    }

    public function update(Request $request, $id)
    {
        $datBan = DatBan::findOrFail($id);

        $request->validate([
            'ten_khach' => 'required|string|max:255',
            'sdt_khach' => 'required|string|max:15',
            'so_khach' => 'required|integer|min:1',
            'ban_id' => 'required|exists:ban_an,id',
            'combo_id' => 'nullable|exists:combo_buffet,id',
            'nhan_vien_id' => 'nullable|exists:nhan_vien,id',
            'gio_den' => 'nullable|date',
            'thoi_luong_phut' => 'nullable|integer|min:15',
            'tien_coc' => 'nullable|numeric|min:0',
            'trang_thai' => 'required|in:cho_xac_nhan,da_xac_nhan,khach_da_den,hoan_tat,huy',
        ]);

        $datBan->update($request->all());

        return redirect()->route('admin.dat-ban.index')->with('success', 'Cập nhật đặt bàn thành công!');
    }

    public function show($id)
    {
        $datBan = DatBan::with(['banAn', 'comboBuffet', 'nhanVien'])->findOrFail($id);
        return view('admins.dat-ban.show', compact('datBan'));
    }

    public function destroy($id)
    {
        $datBan = DatBan::findOrFail($id);
        $datBan->delete();

        return redirect()->route('admin.dat-ban.index')->with('success', 'Xóa đặt bàn thành công!');
    }
  public function getComboInfo($id)
{
    $datBan = DatBan::with(['banAn', 'comboBuffet'])->findOrFail($id);

    return response()->json([
        'ban_id'    => $datBan->banAn?->id,
        'ten_ban'   => $datBan->banAn?->ten_ban ?? 'Chưa gán',
        'tong_mon'  => $datBan->comboBuffet?->so_mon ?? 0,
        'tong_tien' => $datBan->comboBuffet?->gia_combo ?? 0,
    ]);
}
}
