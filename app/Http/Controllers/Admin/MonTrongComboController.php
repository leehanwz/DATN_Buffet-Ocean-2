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
     * Hiển thị danh sách món trong combo
     */
    public function index()
    {
        $monTrongCombos = MonTrongCombo::with(['combo', 'monAn'])->get();
        return view('admins.mon-trong-combo.index', compact('monTrongCombos'));
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
            'gioi_han_goi' => 'nullable|integer|min:1',
            'phu_phi' => 'nullable|numeric|min:0',
        ]);

        // Kiểm tra trùng món trong combo
        $exists = MonTrongCombo::where('combo_id', $request->combo_id)
            ->where('mon_an_id', $request->mon_an_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['mon_an_id' => 'Món này đã tồn tại trong combo!'])->withInput();
        }

        MonTrongCombo::create([
            'combo_id' => $request->combo_id,
            'mon_an_id' => $request->mon_an_id,
            'gioi_han_goi' => $request->gioi_han_goi,
            'phu_phi' => $request->phu_phi,
            'trang_thai' => 1,
        ]);

        return redirect()->route('admins.mon-trong-combo.index')->with('success', 'Thêm món vào combo thành công!');
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
            'gioi_han_goi' => 'nullable|integer|min:1',
            'phu_phi' => 'nullable|numeric|min:0',
        ]);

        $item = MonTrongCombo::findOrFail($id);
        $item->update($request->only(['gioi_han_goi', 'phu_phi', 'trang_thai']));

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
