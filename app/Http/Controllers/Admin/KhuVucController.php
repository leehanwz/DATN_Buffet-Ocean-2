<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuVuc;

class KhuVucController extends Controller
{
    // Danh sách khu vực
    public function index(Request $request)
    {
        $query = KhuVuc::query()->orderByDesc('id');

        // Tìm kiếm theo tên khu vực nếu có
        if ($request->filled('keyword')) {
            $query->where('ten_khu_vuc', 'like', '%' . $request->keyword . '%');
        }

        // Lọc theo trạng thái nếu có
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        $khuVucs = $query->get();

        return view('admins.khu-vuc.index', compact('khuVucs'));
    }

    // Form thêm khu vực
    public function create()
    {
        return view('admins.khu-vuc.create');
    }

    // Lưu khu vực mới
    public function store(Request $request)
    {
        $request->validate([
            'ten_khu_vuc' => 'required|string|max:100|unique:khu_vuc,ten_khu_vuc',
            'mo_ta' => 'nullable|string|max:255',
            'tang' => 'nullable|string|max:10',
            'trang_thai' => 'nullable|in:0,1'
        ]);

        KhuVuc::create([
            'ten_khu_vuc' => $request->ten_khu_vuc,
            'mo_ta' => $request->mo_ta,
            'tang' => $request->tang,
            'trang_thai' => $request->trang_thai ?? 1
        ]);

        return redirect()->route('admins.khu-vuc.index')->with('success', 'Thêm khu vực thành công!');
    }

    // Form chỉnh sửa khu vực
    public function edit($id)
    {
        $khuVuc = KhuVuc::findOrFail($id);
        return view('admins.khu-vuc.edit', compact('khuVuc'));
    }

    // Cập nhật khu vực
    public function update(Request $request, $id)
    {
        $khuVuc = KhuVuc::findOrFail($id);

        $request->validate([
            'ten_khu_vuc' => 'required|string|max:100|unique:khu_vuc,ten_khu_vuc,' . $khuVuc->id,
            'mo_ta' => 'nullable|string|max:255',
            'tang' => 'nullable|string|max:10',
            'trang_thai' => 'nullable|in:0,1'
        ]);

        $khuVuc->update([
            'ten_khu_vuc' => $request->ten_khu_vuc,
            'mo_ta' => $request->mo_ta,
            'tang' => $request->tang,
            'trang_thai' => $request->trang_thai ?? 1
        ]);

        return redirect()->route('admin.khu-vuc.index')->with('success', 'Cập nhật khu vực thành công!');
    }

    // Cập nhật trạng thái bật/tắt nhanh (AJAX hoặc PATCH)
    public function capNhatTrangThai($id)
    {
        $khuVuc = KhuVuc::findOrFail($id);
        $khuVuc->trang_thai = !$khuVuc->trang_thai;
        $khuVuc->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái khu vực thành công!');
    }

    // Xóa khu vực (nếu chưa có bàn)
    public function destroy($id)
    {
        $khuVuc = KhuVuc::with('banAn')->findOrFail($id);

        if ($khuVuc->banAn()->count() > 0) {
            return redirect()->back()->with('error', 'Không thể xóa khu vực vì đang có bàn ăn!');
        }

        $khuVuc->delete();
        return redirect()->route('admins.khu-vuc.index')->with('success', 'Xóa khu vực thành công!');
    }
}