<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MonAn;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Requests\MonAnRequest; // nếu bạn dùng FormRequest để validate

class MonAnController extends Controller
{
    public function index()
    {
        $dsMonAn = MonAn::latest()->paginate(10);
        return view('admins.mon_an.index', compact('dsMonAn'));
    }

    public function create()
    {
        $danhMucs = DanhMuc::where('hien_thi', 1)->get();
        return view('admins.mon_an.create', compact('danhMucs'));
    }

    public function store(MonAnRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/monan'), $fileName);
            $data['hinh_anh'] = 'uploads/monan/'.$fileName;
        }

        MonAn::create($data);

        return redirect()->route('admin.mon-an.index')->with('success', 'Thêm món ăn thành công!');
    }

    public function show(MonAn $mon_an)
    {
        return view('admins.mon_an.show', compact('mon_an'));
    }

    public function edit(MonAn $mon_an)
    {
        $danhMucs = DanhMuc::where('hien_thi', 1)->get();
        return view('admins.mon_an.edit', compact('mon_an', 'danhMucs'));
    }
public function update(MonAnRequest $request, MonAn $mon_an)
{
    $data = $request->validated();

    // ✅ Nếu có ảnh mới thì thay thế
    if ($request->hasFile('hinh_anh')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($mon_an->hinh_anh && file_exists(public_path($mon_an->hinh_anh))) {
            unlink(public_path($mon_an->hinh_anh));
        }

        // Lưu ảnh mới
        $file = $request->file('hinh_anh');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/monan'), $fileName);

        // Cập nhật đường dẫn ảnh mới
        $data['hinh_anh'] = 'uploads/monan/' . $fileName;
    } else {
        // ✅ Nếu không upload ảnh mới → giữ nguyên ảnh cũ
        $data['hinh_anh'] = $mon_an->hinh_anh;
    }

    // ✅ Cập nhật dữ liệu
    $mon_an->update($data);

    return redirect()->route('admin.mon-an.index')->with('success', 'Cập nhật món ăn thành công!');
}

    public function destroy(MonAn $mon_an)
    {
        if ($mon_an->hinh_anh && file_exists(public_path($mon_an->hinh_anh))) {
            unlink(public_path($mon_an->hinh_anh));
        }
        $mon_an->delete();

        return redirect()->route('admin.mon-an.index')->with('success', 'Xóa món ăn thành công!');
    }
}
