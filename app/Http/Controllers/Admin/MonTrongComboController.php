<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonTrongCombo;
use App\Models\ComboBuffet;
use App\Models\MonAn;
use Illuminate\Http\Request;

class MonTrongComboController extends Controller
{
    /**
     * Hiển thị danh sách món trong combo với chức năng lọc.
     */
    public function index(Request $request)
    {
        $query = MonTrongCombo::query();
        
        // 1. Lọc theo Combo ID
        if ($request->combo_id) {
            $query->where('combo_id', $request->combo_id);
        }
        
        // 2. Lọc theo Món Ăn ID
        if ($request->mon_an_id) {
            $query->where('mon_an_id', $request->mon_an_id);
        }

        $monTrongCombos = $query->with(['combo', 'monAn'])->orderByDesc('id')->get();
        
        // Lấy danh sách Combo và Món ăn cho bộ lọc (Dùng select để tối ưu)
        $combos = ComboBuffet::select('id', 'ten_combo')->get();
        $monAns = MonAn::select('id', 'ten_mon')->get();

        // Truyền $request vào view để giữ lại giá trị lọc
        return view('admins.mon-trong-combo.index', compact('monTrongCombos', 'combos', 'monAns', 'request'));
    }

    /**
     * Form thêm món vào combo
     */
    public function create()
    {
        $combos = ComboBuffet::all();
        $monAns = MonAn::all();
        return view('admins.mon-trong-combo.create', compact('combos', 'monAns'));
    }

    /**
     * Lưu món mới vào combo
     */
    public function store(Request $request)
    {
        $request->validate([
            'combo_id' => 'required|exists:combo_buffet,id',
            'mon_an_id' => 'required|exists:mon_an,id',
            'gioi_han_so_luong' => 'nullable|integer|min:1',
            'phu_phi_goi_them' => 'nullable|numeric|min:0', 
        ]);

        $exists = MonTrongCombo::where('combo_id', $request->combo_id)
            ->where('mon_an_id', $request->mon_an_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['mon_an_id' => 'Món này đã tồn tại trong combo!'])->withInput();
        }

        MonTrongCombo::create($request->all());

        return redirect()->route('admin.mon-trong-combo.index')->with('success', 'Thêm món vào combo thành công!');
    }

    /**
     * Form sửa món trong combo
     */
    public function edit($id)
    {
        $item = MonTrongCombo::findOrFail($id);
        $combos = ComboBuffet::all();
        $monAns = MonAn::all();
        return view('admins.mon-trong-combo.edit', compact('item', 'combos', 'monAns'));
    }

    /**
     * Cập nhật món trong combo
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gioi_han_so_luong' => 'nullable|integer|min:1',
            'phu_phi_goi_them' => 'nullable|numeric|min:0', 
        ]);

        $item = MonTrongCombo::findOrFail($id);
        $item->update($request->only(['gioi_han_so_luong', 'phu_phi_goi_them']));

        return redirect()->route('admin.mon-trong-combo.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Xóa món trong combo
     */
    public function destroy($id)
    {
        $item = MonTrongCombo::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.mon-trong-combo.index')->with('success', 'Xóa món trong combo thành công!');
    }
}
