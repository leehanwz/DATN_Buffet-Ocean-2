<?php

namespace App\Http\Controllers\admins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\DanhMuc;

class DanhMucController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::latest()->paginate(10);
        return view('admins.danh_muc.index', compact('danhMucs'));
    }

    public function create()
    {
        return view('admins.danh_muc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'hien_thi' => 'required|boolean'
        ]);

        DanhMuc::create($request->all());

        return redirect()->route('admin.danh-muc.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit(DanhMuc $danh_muc)
    {
        return view('admins.danh_muc.edit', compact('danh_muc'));
    }

    public function update(Request $request, DanhMuc $danh_muc)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'hien_thi' => 'required|boolean'
        ]);

        $danh_muc->update($request->all());

        return redirect()->route('admin.danh-muc.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(DanhMuc $danh_muc)
    {
        // Nếu có món ăn liên quan, bạn có thể xử lý trước khi xóa
        if ($danh_muc->monAn()->count() > 0) {
            return redirect()->route('admin.danh-muc.index')
                             ->with('error', 'Không thể xóa danh mục đang có món ăn.');
        }

        $danh_muc->delete();
        return redirect()->route('admin.danh-muc.index')->with('success', 'Xóa danh mục thành công!');
    }
}
