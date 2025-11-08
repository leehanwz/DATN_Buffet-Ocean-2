<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BanAn;
use App\Models\HoaDon;
use App\Models\OrderMon;
use App\Models\MonAn;
use Carbon\Carbon;
use App\Models\ChiTietOrder;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\DatBan;

class DashboardController extends Controller
{
    public function index()
    {
        $thangHienTai = now()->month;
        $today = Carbon::today();

        // Nhân viên
        $nhanVien = NhanVien::orderBy('id')->take(10)->get(); // paginate(5);
        $tongNhanVien = NhanVien::count();
        $nhanVienNghiHomNay = NhanVien::where('trang_thai', 0)->count();

        // Tổng doanh thu hôm nay
        $doanhThuHomNay = HoaDon::whereDate('created_at', $today)->sum('tong_tien');

        // Lượt đặt bàn hôm nay
        $luotDatBan = BanAn::whereDate('created_at', $today)->count();

        // Tổng số món ăn
        $tongMonAn = MonAn::count();

        // Tổng số đơn hàng
        $tongDonHang = HoaDon::count();

        // Sản phẩm hết hàng
        $monHetHang = MonAn::where('trang_thai', 'Hết hàng')->count();

        // Đơn hàng mới nhất
        $donHangMoi = HoaDon::with('datBan')->latest('created_at')->take(5)->get();

        // Thống kê doanh thu
        $rawDoanhThu = HoaDon::selectRaw('MONTH(created_at) as thang, SUM(tong_tien) as tong')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', '<=', $thangHienTai)
            ->groupBy('thang')
            ->pluck('tong', 'thang')
            ->toArray();

        $doanhThuTheoThang = [];
        for ($i = 1; $i <= $thangHienTai; $i++) {
            $doanhThuTheoThang[] = isset($rawDoanhThu[$i]) ? (int)$rawDoanhThu[$i] : 0;
        }

        // Thống kê lượt đặt bàn
        $rawDatBan = DatBan::selectRaw('MONTH(created_at) as thang, COUNT(*) as tong')
            ->whereYear('created_at', now()->year)
            ->groupBy('thang')
            ->pluck('tong', 'thang')
            ->toArray();

        $luotDatBanTheoThang = [];
        for ($i = 1; $i <= $thangHienTai; $i++) {
            $luotDatBanTheoThang[] = isset($rawDatBan[$i]) ? (int)$rawDatBan[$i] : 0;
        }

        $labels = [];
        for ($i = 1; $i <= $thangHienTai; $i++) {
            $labels[] = "Tháng $i";
        }

        // Món bán chạy nhất hôm nay
        $monBanChay = ChiTietOrder::selectRaw('mon_an_id, SUM(so_luong) as tong')
            ->whereDate('created_at', Carbon::today())
            ->groupBy('mon_an_id')
            ->orderByDesc('tong')
            ->take(5)
            ->with('mon')
            ->get();

        return view('admins.dashboard', compact(
            'doanhThuHomNay',
            'luotDatBan',
            'monBanChay',
            'tongMonAn',
            'tongDonHang',
            'monHetHang',
            'tongNhanVien',
            'donHangMoi',
            'doanhThuTheoThang',
            'luotDatBanTheoThang',
            'nhanVienNghiHomNay',
            'labels',
            'nhanVien',
        ));
    }
}
