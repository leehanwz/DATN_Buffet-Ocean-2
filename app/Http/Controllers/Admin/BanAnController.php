<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BanAn;
use App\Models\KhuVuc;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BanAnController extends Controller
{
    // ================== DANH SÁCH ==================
    public function index(Request $request)
    {
        $khuVucs = KhuVuc::all();
        $query = BanAn::with('khuVuc')->orderByDesc('id');

        if ($request->filled('khu_vuc_id')) {
            $query->where('khu_vuc_id', $request->khu_vuc_id);
        }

        $banAns = $query->get();

        return view('admins.ban-an.index', compact('banAns', 'khuVucs'));
    }

    // ================== FORM CREATE ==================
    public function create()
    {
        $khuVucs = KhuVuc::where('trang_thai', 1)->get();
        return view('admins.ban-an.create', compact('khuVucs'));
    }

    // ================== LƯU MỚI ==================
    public function store(Request $request)
    {
        $request->validate([
            'khu_vuc_id' => 'required|exists:khu_vuc,id',
            'so_ban' => 'required|string|max:50|unique:ban_an,so_ban',
            'so_ghe' => 'required|integer|min:1',
            'trang_thai' => 'nullable|in:trống,đã đặt',
        ]);

        try {
            // 1️⃣ Tạo bản ghi bàn ăn
            $banAn = BanAn::create([
                'khu_vuc_id' => $request->khu_vuc_id,
                'so_ban' => $request->so_ban,
                'so_ghe' => $request->so_ghe,
                'trang_thai' => $request->trang_thai ?? 'trống',
            ]);

            // 2️⃣ Sinh mã QR và file ảnh
            $maQR = Str::upper('BAN' . str_pad($banAn->id, 3, '0', STR_PAD_LEFT));
            $folder = public_path('uploads/qr');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $qrContent = url('/ban-an/' . $banAn->id);
            $fileName = $maQR . '_' . time() . '.png';
            $qrPath = 'uploads/qr/' . $fileName;

            QrCode::format('png')->size(300)->generate($qrContent, public_path($qrPath));

            $banAn->update([
                'ma_qr' => $maQR,
                'duong_dan_qr' => $qrPath
            ]);

            return redirect()->route('admin.ban-an.index')->with('success', 'Thêm bàn ăn thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi tạo bàn: ' . $e->getMessage());
        }
    }

    // ================== FORM EDIT ==================
    public function edit($id)
    {
        $banAn = BanAn::findOrFail($id);
        $khuVucs = KhuVuc::where('trang_thai', 1)->get();
        return view('admins.ban-an.edit', compact('banAn', 'khuVucs'));
    }

    // ================== CẬP NHẬT ==================
    public function update(Request $request, $id)
    {
        $banAn = BanAn::findOrFail($id);

        $request->validate([
            'khu_vuc_id' => 'required|exists:khu_vuc,id',
            'so_ban' => 'required|string|max:50|unique:ban_an,so_ban,' . $banAn->id,
            'so_ghe' => 'required|integer|min:1',
            'trang_thai' => 'required|in:trống,đã đặt',
        ]);

        $banAn->update([
            'khu_vuc_id' => $request->khu_vuc_id,
            'so_ban' => $request->so_ban,
            'so_ghe' => $request->so_ghe,
            'trang_thai' => $request->trang_thai,
        ]);

        return redirect()->route('admin.ban-an.index')->with('success', 'Cập nhật bàn ăn thành công!');
    }

    // ================== CẬP NHẬT TRẠNG THÁI ==================
    public function capNhatTrangThai(Request $request, $id)
    {
        $banAn = BanAn::findOrFail($id);
        $trangThaiMoi = $request->trang_thai;

        if ($trangThaiMoi === 'đã đặt' && $banAn->trang_thai !== 'đã đặt') {
            $banAn->thoi_gian_bat_dau = now();
        }

        if ($trangThaiMoi === 'trống' && $banAn->trang_thai !== 'trống') {
            $banAn->thoi_gian_bat_dau = null;
        }

        $banAn->trang_thai = $trangThaiMoi;
        $banAn->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái bàn thành công!');
    }

    // ================== XOÁ BÀN ==================
    public function destroy($id)
    {
        $banAn = BanAn::findOrFail($id);

        try {
            if ($banAn->duong_dan_qr && File::exists(public_path($banAn->duong_dan_qr))) {
                File::delete(public_path($banAn->duong_dan_qr));
            }

            $banAn->delete();
            return redirect()->route('admin.ban-an.index')->with('success', 'Xóa bàn ăn thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi xóa bàn: ' . $e->getMessage());
        }
    }

    // ================== API LẤY BÀN THEO KHU VỰC ==================
    public function theoKhuVuc($khuVucId)
    {
        $banAns = BanAn::where('khu_vuc_id', $khuVucId)->get();
        return response()->json($banAns);
    }
}
