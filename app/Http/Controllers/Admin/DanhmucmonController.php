<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Danhmucmon;

class DanhmucmonController extends Controller
{
    public function index()
    {
        $danhMucs = Danhmucmon::latest()->paginate(10);
        return view('admins.danhmucmons.index', compact('danhMucs'));
    }

    public function create()
    {
        return view('admins.danhmucmons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'hien_thi' => 'required|boolean'
        ]);

        Danhmucmon::create($request->all());

        return redirect()->route('admin.danhmucmons.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit(Danhmucmon $danh_muc)
    {
        return view('admins.danhmucmons.edit', compact('danhmucmons'));
    }

    public function update(Request $request, Danhmucmon $danh_muc)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'hien_thi' => 'required|boolean'
        ]);

        $danh_muc->update($request->all());

        return redirect()->route('admin.danhmucmons.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(Danhmucmon $danh_muc)
    {
        // Nếu có món ăn liên quan, bạn có thể xử lý trước khi xóa
        if ($danh_muc->mons()->count() > 0) {
            return redirect()->route('admins.danhmucmons.index')
                ->with('error', 'Không thể xóa danh mục đang có món ăn.');
        }

        $danh_muc->delete();
        return redirect()->route('admins.danhmucmons.index')->with('success', 'Xóa danh mục thành công!');
    }
}
