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

    public function edit(Danhmucmon $danhmucmon)
    {
        return view('admins.danhmucmons.edit', ['danhmucmon' => $danhmucmon]);
    }

    public function update(Request $request, Danhmucmon $danhmucmon)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'hien_thi' => 'required|boolean'
        ]);

        $danhmucmon->update($request->all());

        return redirect()->route('admin.danhmucmons.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(Danhmucmon $danhmucmon)
    {
        // Nếu có món ăn liên quan, bạn có thể xử lý trước khi xóa
        if ($danhmucmon->mons()->count() > 0) {
            return redirect()->route('admins.danhmucmons.index')
                ->with('error', 'Không thể xóa danh mục đang có món ăn.');
        }

        $danhmucmon->delete();
        return redirect()->route('admins.danhmucmons.index')->with('success', 'Xóa danh mục thành công!');
    }
}
