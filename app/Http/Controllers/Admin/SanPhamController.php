<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonAn;
use App\Models\DanhMuc;
use App\Http\Requests\MonAnRequest;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Hiển thị danh sách món ăn (sản phẩm) với chức năng lọc và tìm kiếm.
     */
    public function index(Request $request)
    {
        $query = MonAn::query();
        $perPage = 10;
        
        // 1. Lọc theo Danh mục
        if ($request->danh_muc_id) {
            $query->where('danh_muc_id', $request->danh_muc_id);
        }

        // 2. Lọc theo Loại món (ĐÃ THÊM)
        if ($request->loai_mon) {
            $query->where('loai_mon', $request->loai_mon);
        }
        
        // 3. Lọc theo Trạng thái
        if ($request->trang_thai) {
            $query->where('trang_thai', $request->trang_thai);
        }

        // 4. Tìm kiếm theo Từ khóa (tên món hoặc mô tả)
        if ($request->keyword) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('ten_mon', 'like', '%' . $keyword . '%')
                  ->orWhere('mo_ta', 'like', '%' . $keyword . '%');
            });
        }

        // Lấy danh mục cho bộ lọc (Truyền vào view)
        $danhMucs = DanhMuc::select('id', 'ten_danh_muc')->get();

        // Thêm eager loading cho danh mục và phân trang, giữ lại query string cho phân trang
        $dsMonAn = $query->with('danhMuc')->orderByDesc('id')->paginate($perPage)->withQueryString();
        
        // Sửa đường dẫn View: Bạn đang dùng mon_an, nên giữ nguyên
        return view('admins.mon_an.index', compact('dsMonAn', 'danhMucs'));
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
     * *LƯU Ý: Nếu MonAnRequest đã xử lý Validation, bạn có thể bỏ phần thông báo lỗi chi tiết này.*
     */
    public function store(MonAnRequest $request)
    {
        // Sử dụng $request->validated() để đảm bảo Validation từ MonAnRequest đã chạy
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
     * *LƯU Ý: Nếu MonAnRequest đã xử lý Validation, bạn có thể bỏ phần thông báo lỗi chi tiết này.*
     */
    public function update(MonAnRequest $request, MonAn $san_pham)
    {
        // Sử dụng $request->validated() để đảm bảo Validation từ MonAnRequest đã chạy
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
            // Giữ lại ảnh cũ nếu không upload ảnh mới
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