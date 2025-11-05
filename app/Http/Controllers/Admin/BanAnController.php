<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BanAn;
use App\Models\KhuVuc;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class BanAnController extends Controller
{
    /**
     * Hiển thị Form Tạo Bàn Ăn Mới.
     */
    public function create()
    {
        $khuVucs = KhuVuc::orderBy('tang')->get();
        return view('admins.ban-an.create', ['khuVucs' => $khuVucs]);
    }

    /**
     * Lưu Bàn Ăn mới vào database.
     */
    public function store(Request $request)
    {
        // SỬA: Validate giá trị không dấu
        $rules = [
            'khu_vuc_id' => 'required|exists:khu_vuc,id',
            'so_ban' => 'required|string|max:50|unique:ban_an,so_ban',
            'so_ghe' => 'required|integer|min:1',
            'trang_thai' => 'required|in:trong,khong_su_dung',
        ];

        // Định nghĩa thông báo lỗi tiếng Việt
        $messages = [
            'khu_vuc_id.required' => 'Vui lòng chọn Khu vực.',
            'so_ban.required' => 'Vui lòng nhập Số bàn.',
            'so_ban.unique' => 'Số bàn này đã tồn tại.',
            'so_ghe.required' => 'Vui lòng nhập Số ghế.',
            'trang_thai.required' => 'Vui lòng chọn Trạng thái mặc định.',
            'trang_thai.in' => 'Trạng thái mặc định không hợp lệ.',
        ];

        $request->validate($rules, $messages);

        try {
            $uniqueCode = Str::random(12);
            $baseUrl = config('app.url') . '/order';

            BanAn::create([
                'khu_vuc_id' => $request->khu_vuc_id,
                'so_ban' => $request->so_ban,
                'so_ghe' => $request->so_ghe,
                'trang_thai' => trim($request->trang_thai), // Lưu giá trị không dấu
                'ma_qr' => $uniqueCode,
                'duong_dan_qr' => $baseUrl . '?table_code=' . $uniqueCode,
            ]);

            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('success', 'Tạo bàn ăn mới thành công!');
        } catch (QueryException $e) {
            Log::error("DB CREATE FAILED (BanAn): " . $e->getMessage());
            return back()->with('error', 'Lỗi DB: Bàn ăn có thể đã tồn tại hoặc dữ liệu không hợp lệ.');
        }
    }

    /**
     * Hiển thị Form Sửa Bàn Ăn.
     */
    public function edit($id)
    {
        try {
            $banAn = BanAn::findOrFail($id);
            $khuVucs = KhuVuc::orderBy('tang')->get();

            return view('admins.ban-an.edit', [
                'banAn' => $banAn,
                'khuVucs' => $khuVucs
            ]);
        } catch (\Exception $e) {
            Log::error("EDIT BAN AN FAILED: " . $e->getMessage());
            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('error', 'Không tìm thấy Bàn ăn để sửa.');
        }
    }

    /**
     * Cập nhật Bàn Ăn trong database.
     */
    public function update(Request $request, $id)
    {
        $banAn = BanAn::findOrFail($id);

        // SỬA: Validate giá trị không dấu (dùng danh sách mới của bạn)
        $rules = [
            'khu_vuc_id' => 'required|exists:khu_vuc,id',
            'so_ban' => ['required', 'string', 'max:50', Rule::unique('ban_an', 'so_ban')->ignore($banAn->id)],
            'so_ghe' => 'required|integer|min:1',
            'trang_thai' => 'required|in:trong,dang_phuc_vu,da_dat,khong_su_dung',
        ];
        $messages = [
            'khu_vuc_id.required' => 'Vui lòng chọn Khu vực.',
            'so_ban.required' => 'Vui lòng nhập Số bàn.',
            'so_ban.unique' => 'Số bàn này đã tồn tại.',
            'so_ghe.required' => 'Vui lòng nhập Số ghế.',
            'trang_thai.required' => 'Vui lòng chọn Trạng thái.',
            'trang_thai.in' => 'Trạng thái không hợp lệ.',
        ];
        $request->validate($rules, $messages);

        try {
            $updateData = $request->all();
            $updateData['trang_thai'] = trim($request->trang_thai); // Lưu giá trị không dấu

            $banAn->update($updateData);

            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('success', "Cập nhật Bàn {$banAn->so_ban} thành công!");
        } catch (\Exception $e) {
            Log::error("DB UPDATE FAILED (BanAn): " . $e->getMessage());
            return back()->with('error', 'Lỗi hệ thống khi cập nhật bàn ăn.');
        }
    }

    /**
     * Xóa Bàn Ăn khỏi database.
     */
    public function destroy($id)
    {
        try {
            $banAn = BanAn::findOrFail($id);
            $trangThai = trim(strtolower($banAn->trang_thai));

            // SỬA: So sánh với giá trị không dấu (dùng danh sách mới của bạn)
            if (in_array($trangThai, ['dang_phuc_vu', 'da_dat'])) {
                return back()->with('error', "❌ Không thể xóa Bàn {$banAn->so_ban} vì bàn đang có khách hoặc đã được đặt.");
            }

            if (!in_array($trangThai, ['trong', 'khong_su_dung'])) {
                Log::warning("Attempted to delete BanAn ID {$id} with invalid status: '{$banAn->trang_thai}'");
                return back()->with('error', "⚠️ Trạng thái bàn ('{$banAn->trang_thai}') không hợp lệ, không thể xóa.");
            }

            $banAn->delete();
            return redirect()->route('admin.khu-vuc-ban-an')
                ->with('success', "✅ Xóa Bàn {$banAn->so_ban} thành công!");
        } catch (\Exception $e) {
            Log::error("DELETE BAN AN FAILED: " . $e->getMessage());
            return back()->with('error', 'Lỗi hệ thống khi xóa bàn.');
        }
    }

    /**
     * Tái tạo Mã QR cho Bàn Ăn.
     */
    public function regenerateQr($id)
    {
        try {
            $banAn = BanAn::findOrFail($id);
            $newUniqueCode = Str::random(12);
            $baseUrl = config('app.url') . '/order';

            $banAn->update([
                'ma_qr' => $newUniqueCode,
                'duong_dan_qr' => $baseUrl . '?table_code=' . $newUniqueCode,
            ]);

            return back()->with('success', "🔄 Tái tạo QR cho Bàn {$banAn->so_ban} thành công!");
        } catch (\Exception $e) {
            Log::error("REGENERATE QR FAILED: " . $e->getMessage());
            return back()->with('error', 'Lỗi hệ thống khi tạo lại QR.');
        }
    }
}