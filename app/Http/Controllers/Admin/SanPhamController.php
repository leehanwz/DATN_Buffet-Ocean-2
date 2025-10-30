<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonAn;
use App\Models\DanhMucMon;

class SanPhamController extends Controller
{
    public function index(Request $request)
    {
        $query = MonAn::with('danhMuc');

        if ($request->filled('keyword')) {
            $query->where('ten_mon', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('danh_muc_id')) {
            $query->where('danh_muc_id', $request->danh_muc_id);
        }

        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        $monAn = $query->orderBy('id', 'asc')->paginate(10);
        $danhMucs = DanhMucMon::all();

        return view('admins.san-pham.index', compact('monAn', 'danhMucs'));
    }

    public function trangthai(Request $request, $id)
    {
        $monAn = MonAn::findOrFail($id);
        $monAn->trang_thai = $request->trang_thai;
        $monAn->save();
    
        return redirect()->route('admin.san-pham.index')
                         ->with('success', 'Cập nhật trạng thái thành công!');
    }
    
}
