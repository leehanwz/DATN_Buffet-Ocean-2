<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComboBuffet;

class ComboBuffetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combos = ComboBuffet::orderByDesc('id')->get();
        return view('admins.combo.index', compact('combos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.combo.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ten_combo' => 'required|string|max:255',
            'loai_combo' => 'required|in:Tối,Cuối tuần',
            'gia_co_ban' => 'required|numeric|min:1',
            'thoi_luong_phut' => 'required|integer|min:15',
            'thoi_gian_bat_dau' => 'required|date',
            'thoi_gian_ket_thuc' => 'required|date|after:thoi_gian_bat_dau',
            'trang_thai' => 'required|in:Hoạt động,Tạm ngưng',
        ],
        [
            'ten_combo.required' => 'Vui lòng nhập tên combo.',
            'loai_combo.required' => 'Vui lòng chọn loại combo.',
            'loai_combo.in' => 'Loại combo không hợp lệ.',
            'gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',
            'gia_co_ban.numeric' => 'Giá cơ bản phải là số.',
            'gia_co_ban.min' => 'Giá cơ bản phải lớn hơn 0đ.',
            'thoi_luong_phut.required' => 'Vui lòng nhập thời lượng.',
            'thoi_luong_phut.integer' => 'Thời lượng phải là số nguyên.',
            'thoi_luong_phut.min' => 'Thời lượng ít nhất là 15 phút.',
            'thoi_gian_bat_dau.required' => 'Vui lòng chọn thời gian bắt đầu.',
            'thoi_gian_ket_thuc.required' => 'Vui lòng chọn thời gian kết thúc.',
            'thoi_gian_ket_thuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'trang_thai.required' => 'Vui lòng chọn trạng thái combo.',
            'trang_thai.in' => 'Trạng thái không hợp lệ.',
        ]);

        ComboBuffet::create($request->all());

        return redirect()->route('combo-buffet.index')->with('Thêm combo buffet thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $combo = ComboBuffet::findOrFail($id);
        return view('admins.combo.edit', compact('combo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $combo = ComboBuffet::findOrFail($id);

        $request->validate([
            'ten_combo' => 'required|string|max:255',
            'loai_combo' => 'required|in:Tối,Cuối tuần',
            'gia_co_ban' => 'required|numeric|min:1',
            'thoi_luong_phut' => 'required|integer|min:15',
            'thoi_gian_bat_dau' => 'required|date',
            'thoi_gian_ket_thuc' => 'required|date|after:thoi_gian_bat_dau',
            'trang_thai' => 'required|in:Hoạt động,Tạm ngưng',
        ],
        [
            'ten_combo.required' => 'Vui lòng nhập tên combo.',
            'loai_combo.required' => 'Vui lòng chọn loại combo.',
            'loai_combo.in' => 'Loại combo không hợp lệ.',
            'gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',
            'gia_co_ban.numeric' => 'Giá cơ bản phải là số.',
            'gia_co_ban.min' => 'Giá cơ bản phải lớn hơn 0đ.',
            'thoi_luong_phut.required' => 'Vui lòng nhập thời lượng.',
            'thoi_luong_phut.integer' => 'Thời lượng phải là số nguyên.',
            'thoi_luong_phut.min' => 'Thời lượng ít nhất là 15 phút.',
            'thoi_gian_bat_dau.required' => 'Vui lòng chọn thời gian bắt đầu.',
            'thoi_gian_ket_thuc.required' => 'Vui lòng chọn thời gian kết thúc.',
            'thoi_gian_ket_thuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'trang_thai.required' => 'Vui lòng chọn trạng thái combo.',
            'trang_thai.in' => 'Trạng thái không hợp lệ.',
        ]);

        $combo->update([
            'ten_combo' => $request->ten_combo,
            'loai_combo' => $request->loai_combo,
            'gia_co_ban' => $request->gia_co_ban,
            'thoi_luong_phut' => $request->thoi_luong_phut,
            'thoi_gian_bat_dau' => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc' => $request->thoi_gian_ket_thuc,
            'trang_thai' => $request->trang_thai,
        ]);

        return redirect()->route('combo-buffet.index')
            ->with('Cập nhật combo buffet thành công');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $combo = ComboBuffet::findOrFail($id);
        $combo->delete();

        return redirect()->route('combo-buffet.index')
            ->with('Xóa combo buffet thành công');
    }
}
