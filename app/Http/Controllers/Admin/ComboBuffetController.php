<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComboBuffet;

class ComboBuffetController extends Controller
{
    /**
     * Hiển thị danh sách.
     */
    public function index()
    {
        $combos = ComboBuffet::orderByDesc('id')->get();
        // SỬA CHUẨN: Dùng 'admins.combo.index' để khớp với thư mục của bạn
        return view('admins.combo.index', compact('combos'));
    }

    /**
     * Hiển thị form thêm mới.
     */
    public function create()
    {
        // SỬA CHUẨN: Dùng 'admins.combo.create' để khớp với thư mục của bạn
        return view('admins.combo.create');
    }

    /**
     * Lưu vào DB.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_combo' => 'required|string|max:255',
            'loai_combo' => 'nullable|in:nguoi_lon,tre_em,vip,khuyen_mai',
            'gia_co_ban' => 'required|numeric|min:1',
            'thoi_luong_phut' => 'nullable|integer|min:15',
            'thoi_gian_bat_dau' => 'nullable|date',
            'thoi_gian_ket_thuc' => 'nullable|date|after:thoi_gian_bat_dau',
            'trang_thai' => 'required|in:dang_ban,ngung_ban',
        ],
        [
            'ten_combo.required' => 'Vui lòng nhập tên combo.',
            'gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',
            'thoi_gian_ket_thuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'trang_thai.required' => 'Vui lòng chọn trạng thái combo.',
        ]);

        ComboBuffet::create($request->all());

        return redirect()->route('admin.combo-buffet.index')->with('success', 'Thêm combo buffet thành công');
    }

    /**
     * Hiển thị chi tiết (Không đổi)
     */
    public function show(string $id)
    {
        $combo = ComboBuffet::findOrFail($id);
        return view('admins.combo-buffet.show', compact('combo'));
    }

    /**
     * Hiển thị form sửa.
     */
    public function edit(string $id)
    {
        $combo = ComboBuffet::findOrFail($id);
        // SỬA CHUẨN: Dùng 'admins.combo.edit' để khớp với thư mục của bạn
        return view('admins.combo.edit', compact('combo'));
    }

    /**
     * Cập nhật vào DB.
     */
    public function update(Request $request, string $id)
    {
        $combo = ComboBuffet::findOrFail($id);

        $request->validate([
            'ten_combo' => 'required|string|max:255',
            'loai_combo' => 'nullable|in:nguoi_lon,tre_em,vip,khuyen_mai',
            'gia_co_ban' => 'required|numeric|min:1',
            'thoi_luong_phut' => 'nullable|integer|min:15',
            'thoi_gian_bat_dau' => 'nullable|date',
            'thoi_gian_ket_thuc' => 'nullable|date|after:thoi_gian_bat_dau',
            'trang_thai' => 'required|in:dang_ban,ngung_ban',
        ],
        [
            'ten_combo.required' => 'Vui lòng nhập tên combo.',
            'gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',
            'thoi_gian_ket_thuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'trang_thai.required' => 'Vui lòng chọn trạng thái combo.',
        ]);

        $combo->update($request->all());

        return redirect()->route('admin.combo-buffet.index')
            ->with('success', 'Cập nhật combo buffet thành công');
    }

    /**
     * Xóa.
     */
    public function destroy(string $id)
    {
        $combo = ComboBuffet::findOrFail($id);
        $combo->delete();

        return redirect()->route('admin.combo-buffet.index')
            ->with('success', 'Xóa combo buffet thành công');
    }
}