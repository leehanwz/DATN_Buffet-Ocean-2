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
            'gia_co_ban' => 'required|numeric|min:0',
            'loai_combo' => 'nullable|string|max:255',
            'thoi_luong_phut' => 'nullable|integer|min:0',
            'thoi_gian_bat_dau' => 'nullable|date',
            'thoi_gian_ket_thuc' => 'nullable|date|after_or_equal:thoi_gian_bat_dau',
            'trang_thai' => 'nullable|string|max:255',
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
            'loai_combo' => 'nullable|string|max:255',
            'gia_co_ban' => 'required|numeric|min:0',
            'thoi_luong_phut' => 'nullable|integer|min:0',
            'thoi_gian_bat_dau' => 'nullable|date',
            'thoi_gian_ket_thuc' => 'nullable|date|after_or_equal:thoi_gian_bat_dau',
            'trang_thai' => 'nullable|string|max:255',
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
