<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{

/**
     * Hiển thị danh sách voucher
     * SỬA: Thêm Request $request và logic filter
     */
    public function index(Request $request)
    {
        // Bắt đầu câu truy vấn
        $query = Voucher::latest();

        // Lọc theo từ khóa (Mã Voucher, Mô tả)
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('ma_voucher', 'LIKE', $searchTerm)
                  ->orWhere('mo_ta', 'LIKE', $searchTerm);
            });
        }

        // Lọc theo Loại giảm
        if ($request->filled('loai_giam')) {
            $query->where('loai_giam', $request->loai_giam);
        }

        // Lọc theo Trạng thái
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        // Thực thi truy vấn và phân trang
        $vouchers = $query->paginate(10);
        
        // Gắn các tham số tìm kiếm vào link phân trang
        $vouchers->appends($request->query());

        return view('admins.voucher.index', compact('vouchers'));
    }

    /**
     * Hiển thị form tạo mới
     */
    public function create()
    {
        return view('admins.voucher.create');
    }

    /**
     * Lưu voucher mới
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ma_voucher' => 'required|string|max:255|unique:vouchers',
            'loai_giam' => 'required|in:phan_tram,tien_mat',
            'gia_tri' => 'required|numeric|min:0',
            'gia_tri_toi_da' => 'nullable|numeric|min:0',
            'so_luong' => 'required|integer|min:0',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
            'trang_thai' => 'required|in:dang_ap_dung,ngung_ap_dung',
            'mo_ta' => 'nullable|string',
        ]);

        Voucher::create($validated);

        return redirect()->route('admin.voucher.index')
            ->with('success', 'Tạo voucher mới thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa
     */
    public function edit(Voucher $voucher)
    {
        return view('admins.voucher.edit', compact('voucher'));
    }

    /**
     * Cập nhật voucher
     */
    public function update(Request $request, Voucher $voucher)
    {
        $validated = $request->validate([
            'ma_voucher' => [
                'required',
                'string',
                'max:255',
                Rule::unique('vouchers')->ignore($voucher->id),
            ],
            'loai_giam' => 'required|in:phan_tram,tien_mat',
            'gia_tri' => 'required|numeric|min:0',
            'gia_tri_toi_da' => 'nullable|numeric|min:0',
            'so_luong' => 'required|integer|min:0',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
            'trang_thai' => 'required|in:dang_ap_dung,ngung_ap_dung',
            'mo_ta' => 'nullable|string',
        ]);

        $voucher->update($validated);

        return redirect()->route('admin.voucher.index')
            ->with('success', 'Cập nhật voucher thành công!');
    }

    /**
     * Xóa voucher
     */
    public function destroy(Voucher $voucher)
    {
        // Thêm kiểm tra an toàn: nếu voucher đã được dùng thì không cho xóa
        if ($voucher->so_luong_da_dung > 0) {
            return redirect()->route('admin.voucher.index')
                ->with('error', 'Không thể xóa voucher đã được sử dụng!');
        }
        
        $voucher->delete();

        return redirect()->route('admin.voucher.index')
            ->with('success', 'Xóa voucher thành công!');
    }
}