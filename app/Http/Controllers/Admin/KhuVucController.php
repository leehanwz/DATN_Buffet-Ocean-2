<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuVuc;
use App\Models\BanAn;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class KhuVucController extends Controller
{
    /**
     * Hiển thị trang quản lý Khu Vực & Bàn Ăn.
     */
    public function showManagementPage()
    {
        $khuVucs = collect();
        $errorMessage = null;

        try {
            $khuVucs = KhuVuc::with('banAns')->orderBy('tang')->get();
        } catch (QueryException $e) {
            $errorMessage = "Lỗi Database: " . $e->getMessage();
            Log::error("DB QUERY CRASH (KhuVuc): " . $e->getMessage());
        } catch (\Exception $e) {
            $errorMessage = "Lỗi hệ thống không xác định: " . $e->getMessage();
            Log::error("System CRASH: " . $e->getMessage());
        }

        return view('admins.khu-vuc-ban-an', [
            'khuVucs' => $khuVucs,
            'errorMessage' => $errorMessage
        ]);
    }

    /**
     * Hiển thị Form Tạo Khu Vuc Mới.
     */
    public function create()
    {
        return view('admins.khu-vuc.create');
    }

    /**
     * Lưu Khu Vuc mới vào database.
     */
    public function store(Request $request)
    {
        $rules = [
            'ten_khu_vuc' => 'required|string|max:100|unique:khu_vuc,ten_khu_vuc',
            'tang' => 'required|integer|min:1',
            'mo_ta' => 'required|string|max:255', // SỬA: Bỏ 'nullable', thêm 'required'
        ];

        $messages = [
            'ten_khu_vuc.required' => 'Vui lòng nhập Tên Khu vực.',
            'ten_khu_vuc.unique' => 'Tên Khu vực này đã tồn tại.',
            'ten_khu_vuc.max' => 'Tên Khu vực không được vượt quá 100 ký tự.',
            'tang.required' => 'Vui lòng nhập Số tầng.',
            'tang.integer' => 'Số tầng phải là số nguyên.',
            'tang.min' => 'Số tầng phải lớn hơn 0.',
            'mo_ta.required' => 'Vui lòng nhập Mô tả.', // THÊM: Thông báo lỗi cho Mô tả
            'mo_ta.max' => 'Mô tả không được vượt quá 255 ký tự.',
        ];

        $request->validate($rules, $messages);

        try {
            KhuVuc::create($request->all());

            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('success', 'Tạo khu vực mới thành công!');
        } catch (QueryException $e) {
            Log::error("DB CREATE FAILED (KhuVuc): " . $e->getMessage());
            return back()->with('error', 'Lỗi DB: Khu vực có thể đã tồn tại hoặc dữ liệu không hợp lệ.');
        }
    }

    /**
     * Hiển thị Form Sửa Khu Vuc.
     */
    public function edit($id)
    {
        try {
            $khuVuc = KhuVuc::findOrFail($id);
            return view('admins.khu-vuc.edit-khu-vuc', ['khuVuc' => $khuVuc]);
        } catch (\Exception $e) {
            Log::error("EDIT KHUVUC FAILED: " . $e->getMessage());
            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('error', 'Không tìm thấy Khu vực để sửa.');
        }
    }

    /**
     * Cập nhật Khu Vuc trong database.
     */
    public function update(Request $request, $id)
    {
        $khuVuc = KhuVuc::findOrFail($id);

        $rules = [
            'ten_khu_vuc' => ['required', 'string', 'max:100', Rule::unique('khu_vuc', 'ten_khu_vuc')->ignore($khuVuc->id)],
            'tang' => 'required|integer|min:1',
            'mo_ta' => 'required|string|max:255',
        ];

        $messages = [
            'ten_khu_vuc.required' => 'Vui lòng nhập Tên Khu vực.',
            'ten_khu_vuc.unique' => 'Tên Khu vực này đã tồn tại.',
            'ten_khu_vuc.max' => 'Tên Khu vực không được vượt quá 100 ký tự.',
            'tang.required' => 'Vui lòng nhập Số tầng.',
            'tang.integer' => 'Số tầng phải là số nguyên.',
            'tang.min' => 'Số tầng phải lớn hơn 0.',
            'mo_ta.required' => 'Vui lòng nhập Mô tả.',
            'mo_ta.max' => 'Mô tả không được vượt quá 255 ký tự.',
        ];

        $request->validate($rules, $messages);

        try {
            $khuVuc->update($request->all());
            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('success', "Cập nhật Khu vực {$khuVuc->ten_khu_vuc} thành công!");
        } catch (\Exception $e) {
            Log::error("DB UPDATE FAILED (KhuVuc): " . $e->getMessage());
            return back()->with('error', 'Lỗi hệ thống khi cập nhật khu vực.');
        }
    }

    /**
     * Xóa Khu Vuc khỏi database.
     */
    public function destroy($id)
    {
        try {
            $khuVuc = KhuVuc::findOrFail($id);

            if ($khuVuc->banAns()->exists()) {
                return back()->with('error', "Không thể xóa Khu vực {$khuVuc->ten_khu_vuc} vì vẫn còn bàn ăn liên kết.");
            }

            $khuVuc->delete();

            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('success', "Xóa Khu vực {$khuVuc->ten_khu_vuc} thành công!");
        } catch (\Exception $e) {
            Log::error("DELETE KHUVUC FAILED: " . $e->getMessage());
            return back()->with('error', 'Lỗi hệ thống khi xóa khu vực.');
        }
    }
}