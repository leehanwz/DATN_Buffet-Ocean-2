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
     * ✅ Hiển thị danh sách tất cả bàn ăn.
     */
    public function index()
    {
        try {
            $banAns = BanAn::with('khuVuc')
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('admins.khu-vuc-ban-an', compact('banAns'));
        } catch (\Exception $e) {
            Log::error("FETCH BAN AN FAILED: " . $e->getMessage());
            return back()->with('error', 'Không thể tải danh sách bàn ăn.');
        }
    }

    /**
     * ✅ Hiển thị Form Tạo Bàn Ăn Mới.
     */
    public function create()
    {
        $khuVucs = KhuVuc::orderBy('tang')->get();
        return view('admins.ban-an.create', ['khuVucs' => $khuVucs]);
    }

    /**
     * ✅ Lưu Bàn Ăn mới vào database.
     */
    public function store(Request $request)
    {
        $rules = [
            'khu_vuc_id' => 'required|exists:khu_vuc,id',
            'so_ban' => 'required|string|max:50|unique:ban_an,so_ban',
            'so_ghe' => 'required|integer|min:1',
            'trang_thai' => 'required|in:trong,khong_su_dung',
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
            $uniqueCode = Str::random(12);
            $baseUrl = config('app.url') . '/order';

            BanAn::create([
                'khu_vuc_id' => $request->khu_vuc_id,
                'so_ban' => $request->so_ban,
                'so_ghe' => $request->so_ghe,
                'trang_thai' => trim($request->trang_thai),
                'ma_qr' => $uniqueCode,
                'duong_dan_qr' => $baseUrl . '?table_code=' . $uniqueCode,
            ]);

            return redirect()->route('admins.ban-an.index')
                ->with('success', '✅ Tạo bàn ăn mới thành công!');
        } catch (QueryException $e) {
            Log::error("DB CREATE FAILED (BanAn): " . $e->getMessage());
            return back()->with('error', 'Lỗi DB: Dữ liệu không hợp lệ hoặc trùng lặp.');
        }
    }

    /**
     * ✅ Hiển thị Form Sửa Bàn Ăn.
     */
    public function edit($id)
    {
        try {
            $banAn = BanAn::findOrFail($id);
            $khuVucs = KhuVuc::orderBy('tang')->get();

            return view('admins.ban-an.edit', compact('banAn', 'khuVucs'));
        } catch (\Exception $e) {
            Log::error("EDIT BAN AN FAILED: " . $e->getMessage());
            return redirect()->route('ban-an.index')
                ->with('error', 'Không tìm thấy Bàn ăn để sửa.');
        }
    }

    /**
     * ✅ Cập nhật Bàn Ăn.
     */
    public function update(Request $request, $id)
    {
        // Lấy thông tin bàn ăn theo ID hoặc báo lỗi 404 nếu không tồn tại
        $banAn = BanAn::findOrFail($id);

        // ===== VALIDATION RULES =====
        $validated = $request->validate([
            'khu_vuc_id' => 'required|exists:khu_vuc,id',
            'so_ban' => [
                'required',
                'string',
                'max:50',
                Rule::unique('ban_an', 'so_ban')->ignore($banAn->id),
            ],
            'so_ghe' => 'required|integer|min:1',
            'trang_thai' => 'required|in:trong,dang_phuc_vu,da_dat,khong_su_dung',
        ], [
            'khu_vuc_id.required' => 'Vui lòng chọn Khu vực.',
            'khu_vuc_id.exists'   => 'Khu vực được chọn không hợp lệ.',
            'so_ban.required'     => 'Vui lòng nhập Số bàn.',
            'so_ban.unique'       => 'Số bàn này đã tồn tại.',
            'so_ban.max'          => 'Số bàn không được vượt quá 50 ký tự.',
            'so_ghe.required'     => 'Vui lòng nhập Số ghế.',
            'so_ghe.integer'      => 'Số ghế phải là số nguyên.',
            'so_ghe.min'          => 'Số ghế phải lớn hơn 0.',
            'trang_thai.required' => 'Vui lòng chọn Trạng thái.',
            'trang_thai.in'       => 'Trạng thái không hợp lệ.',
        ]);

        try {
            // ===== CẬP NHẬT DỮ LIỆU =====
            $banAn->update($validated);

            // ===== CHUYỂN HƯỚNG VỀ TRANG DANH SÁCH =====
            return redirect()
                ->route('admin.khu-vuc-ban-an') // ✅ route đúng theo mô tả của bạn
                ->with('success', "✅ Cập nhật Bàn {$banAn->so_ban} thành công!");
        } catch (\Exception $e) {
            dd($e->getMessage()); // ✅ In ra lỗi thật trên trình duyệt (quan trọng)
            Log::error("❌ Lỗi khi cập nhật Bàn ăn (ID {$id}): " . $e->getMessage());

            return back()
                ->with('error', '❌ Có lỗi xảy ra khi cập nhật bàn ăn, vui lòng thử lại sau.')
                ->withInput();
        }
    }


    /**
     * ✅ Xóa Bàn Ăn.
     */
    public function destroy($id)
    {
        try {
            $banAn = BanAn::findOrFail($id);
            $trangThai = trim(strtolower($banAn->trang_thai));

            if (in_array($trangThai, ['dang_phuc_vu', 'da_dat'])) {
                return back()->with('error', "❌ Không thể xóa Bàn {$banAn->so_ban} vì đang có khách hoặc đã đặt.");
            }

            if (!in_array($trangThai, ['trong', 'khong_su_dung'])) {
                return back()->with('error', "⚠️ Trạng thái bàn '{$banAn->trang_thai}' không hợp lệ để xóa.");
            }

            $banAn->delete();

            return redirect()->route('ban-an.index')
                ->with('success', "🗑️ Xóa Bàn {$banAn->so_ban} thành công!");
        } catch (\Exception $e) {
            Log::error("DELETE BAN AN FAILED: " . $e->getMessage());
            return back()->with('error', 'Lỗi hệ thống khi xóa bàn.');
        }
    }

    /**
     * ✅ Tái tạo QR cho Bàn Ăn.
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
