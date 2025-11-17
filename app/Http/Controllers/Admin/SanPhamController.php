<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonAn;
use App\Models\DanhMuc;
use App\Http\Requests\MonAnRequest;
use Illuminate\Http\Request;

// THÊM CÁC USE NÀY
use App\Models\ThuVienAnhMonAn; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\File; 

class SanPhamController extends Controller
{
    // ... (Giữ nguyên phương thức index) ...
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

    // ... (Giữ nguyên phương thức create) ...
    public function create()
    {
        $danhMucs = DanhMuc::where('hien_thi', 1)->get();
        return view('admins.mon_an.create', compact('danhMucs'));
    }

    // ----------------------------------------------------------------------
    // PHƯƠNG THỨC STORE (THÊM MỚI)
    // ----------------------------------------------------------------------
    public function store(MonAnRequest $request)
    {
        DB::beginTransaction(); // Bắt đầu Transaction
        
        try {
            $data = $request->validated(); 
            $data['hinh_anh'] = null; // Đảm bảo cột ảnh chính được xử lý

            // 1. Xử lý Ảnh chính
            if ($request->hasFile('hinh_anh')) {
                $file = $request->file('hinh_anh');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/monan'), $fileName);
                $data['hinh_anh'] = 'uploads/monan/' . $fileName;
            }

            // 2. Tạo món ăn chính và lấy ID
            $monAn = MonAn::create($data); 

            // 3. Xử lý Thư viện ảnh (anh_thu_vien[])
            if ($request->hasFile('anh_thu_vien')) {
                $imagePaths = [];
                foreach ($request->file('anh_thu_vien') as $file) {
                    $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/gallery/monan'), $fileName); 
                    
                    $imagePaths[] = [
                        'mon_an_id' => $monAn->id,
                        'duong_dan_anh' => 'uploads/gallery/monan/' . $fileName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                ThuVienAnhMonAn::insert($imagePaths);
            }

            DB::commit(); // Hoàn tất transaction
            
            return redirect()->route('admin.san-pham.index')
                ->with('success', 'Thêm món ăn thành công!');

        } catch (\Exception $e) {
            DB::rollBack(); 
            return back()->withInput()->with('error', 'Lỗi hệ thống: Không thể thêm món ăn.');
        }
    }

    // ----------------------------------------------------------------------
    // PHƯƠNG THỨC SHOW (XEM CHI TIẾT)
    // ----------------------------------------------------------------------
    public function show(MonAn $san_pham)
    {
        $san_pham->load('thuVienAnh'); // Eager load thư viện ảnh khi xem chi tiết
        return view('admins.mon_an.show', ['mon_an' => $san_pham]);
    }

    // ----------------------------------------------------------------------
    // PHƯƠNG THỨC EDIT (FORM SỬA)
    // ----------------------------------------------------------------------
    public function edit(MonAn $san_pham)
    {
        $san_pham->load('thuVienAnh'); // Eager load thư viện ảnh để hiển thị ảnh cũ
        $danhMucs = DanhMuc::where('hien_thi', 1)->get();
        return view('admins.mon_an.edit', compact('san_pham', 'danhMucs'));
    }

    // ----------------------------------------------------------------------
    // PHƯƠNG THỨC UPDATE (CẬP NHẬT)
    // ----------------------------------------------------------------------
    public function update(MonAnRequest $request, MonAn $san_pham)
    {
        DB::beginTransaction();
        
        try {
            $data = $request->validated(); 
            
            // 1. Cập nhật Ảnh chính (hinh_anh)
            if ($request->hasFile('hinh_anh')) {
                if ($san_pham->hinh_anh && File::exists(public_path($san_pham->hinh_anh))) {
                    File::delete(public_path($san_pham->hinh_anh)); // Xóa file cũ
                }

                $file = $request->file('hinh_anh');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/monan'), $fileName);
                $data['hinh_anh'] = 'uploads/monan/' . $fileName;
            } else {
                $data['hinh_anh'] = $san_pham->hinh_anh; // Giữ lại ảnh cũ
            }

            // 2. Xóa ảnh phụ CŨ (Dựa trên input ẩn 'anh_xoa')
            if ($request->anh_xoa) {
                $idsToDelete = explode(',', $request->anh_xoa);
                
                $photosToDelete = ThuVienAnhMonAn::whereIn('id', $idsToDelete)
                                                ->pluck('duong_dan_anh');

                foreach ($photosToDelete as $path) {
                    if (File::exists(public_path($path))) {
                        File::delete(public_path($path)); // Xóa file vật lý
                    }
                }

                ThuVienAnhMonAn::whereIn('id', $idsToDelete)->delete(); // Xóa bản ghi DB
            }

            // 3. Thêm ảnh phụ MỚI (anh_thu_vien[])
            if ($request->hasFile('anh_thu_vien')) {
                $imagePaths = [];
                foreach ($request->file('anh_thu_vien') as $file) {
                    $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/gallery/monan'), $fileName);
                    
                    $imagePaths[] = [
                        'mon_an_id' => $san_pham->id,
                        'duong_dan_anh' => 'uploads/gallery/monan/' . $fileName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                ThuVienAnhMonAn::insert($imagePaths);
            }
            
            // 4. Cập nhật thông tin món ăn chính
            $san_pham->update($data);

            DB::commit();

            return redirect()->route('admin.san-pham.index')
                ->with('success', 'Cập nhật món ăn thành công!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Lỗi hệ thống: Không thể cập nhật món ăn.');
        }
    }

    // ----------------------------------------------------------------------
    // PHƯƠNG THỨC DESTROY (XÓA)
    // ----------------------------------------------------------------------
    public function destroy(MonAn $san_pham)
    {
        DB::beginTransaction();

        try {
            // 1. Xóa Ảnh chính
            if ($san_pham->hinh_anh && File::exists(public_path($san_pham->hinh_anh))) {
                File::delete(public_path($san_pham->hinh_anh));
            }
            
            // 2. Xóa tất cả Ảnh phụ (File vật lý)
            // Lấy tất cả đường dẫn ảnh phụ
            $photosToDelete = $san_pham->thuVienAnh->pluck('duong_dan_anh');

            foreach ($photosToDelete as $path) {
                if (File::exists(public_path($path))) {
                    File::delete(public_path($path));
                }
            }
            
            // 3. Xóa bản ghi MonAn (ON DELETE CASCADE sẽ tự động xóa bản ghi ThuVienAnhMonAn)
            $san_pham->delete();

            DB::commit();
            return redirect()->route('admin.san-pham.index')
                ->with('success', 'Xóa món ăn thành công!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi hệ thống: Không thể xóa món ăn.');
        }
    }
}