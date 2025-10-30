<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonAn;
use App\Models\DanhMuc;
use App\Http\Requests\MonAnRequest;

class SanPhamController extends Controller
{
    /**
     * Hiển thị danh sách món ăn (sản phẩm)
     */
    public function index()
    {
        $dsMonAn = MonAn::latest()->paginate(10);
        return view('admins.mon_an.index', compact('dsMonAn'));
    }

    /**
     * Hiển thị form tạo món ăn mới
     */
    public function create()
    {
        $danhMucs = DanhMuc::where('hien_thi', 1)->get();
        return view('admins.mon_an.create', compact('danhMucs'));
    }

    /**
     * Lưu món ăn mới
     */
    public function store(MonAnRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/monan'), $fileName);
            $data['hinh_anh'] = 'uploads/monan/' . $fileName;
        }

        MonAn::create($data);

        return redirect()->route('admin.san-pham.index')
            ->with('success', 'Thêm món ăn thành công!');
    }

    /**
     * Hiển thị chi tiết món ăn
     */
    public function show(MonAn $san_pham)
    {
        return view('admins.mon_an.show', ['mon_an' => $san_pham]);
    }

    /**
     * Hiển thị form chỉnh sửa món ăn
     */
    public function edit(MonAn $san_pham)
    {
        $danhMucs = DanhMuc::where('hien_thi', 1)->get();
        return view('admins.mon_an.edit', compact('san_pham', 'danhMucs'));
    }

    /**
     * Cập nhật món ăn
     */
    public function update(MonAnRequest $request, MonAn $san_pham)
    {
        $data = $request->validated();

        if ($request->hasFile('hinh_anh')) {
            // Xóa file cũ nếu có
            if ($san_pham->hinh_anh && file_exists(public_path($san_pham->hinh_anh))) {
                unlink(public_path($san_pham->hinh_anh));
            }

            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/monan'), $fileName);
            $data['hinh_anh'] = 'uploads/monan/' . $fileName;
        } else {
            $data['hinh_anh'] = $san_pham->hinh_anh;
        }

        $san_pham->update($data);

        return redirect()->route('admin.san-pham.index')
            ->with('success', 'Cập nhật món ăn thành công!');
    }

    /**
     * Xóa món ăn
     */
    public function destroy(MonAn $san_pham)
    {
        if ($san_pham->hinh_anh && file_exists(public_path($san_pham->hinh_anh))) {
            unlink(public_path($san_pham->hinh_anh));
        }

        $san_pham->delete();

        return redirect()->route('admin.san-pham.index')
            ->with('success', 'Xóa món ăn thành công!');
    }
}
