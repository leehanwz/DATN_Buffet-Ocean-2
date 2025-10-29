<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonAn;
use App\Models\Danhmucmon;
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
        $danhMucs = Danhmucmon::where('hien_thi', 1)->get();
        return view('admins.mon_an.create', compact('danhMucs'));
    }

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

        return redirect()->route('admin.mon-an.index')->with('success', 'Thêm món ăn thành công!');
    }

    public function show(MonAn $mon_an)
    {
        return view('admins.mon_an.show', compact('mon_an'));
    }

    public function edit(MonAn $mon_an)
    {
        $danhMucs = Danhmucmon::where('hien_thi', 1)->get();
        return view('admins.mon_an.edit', compact('mon_an', 'danhMucs'));
    }

    public function update(MonAnRequest $request, MonAn $mon_an)
    {
        $data = $request->validated();

        if ($request->hasFile('hinh_anh')) {
            if ($mon_an->hinh_anh && file_exists(public_path($mon_an->hinh_anh))) {
                unlink(public_path($mon_an->hinh_anh));
            }
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/monan'), $fileName);
            $data['hinh_anh'] = 'uploads/monan/' . $fileName;
        }

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
