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


class DashboardController extends Controller
{
    public function index()
    {
        $nhanVienMoi = \App\Models\NhanVien::latest('created_at')->take(5)->get();

        $today = Carbon::today();

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

        // Tổng số nhân viên (nếu có)
        $tongNhanVien = \App\Models\NhanVien::count(); // nếu bạn có model NhanVien

        // Đơn hàng mới nhất
        $donHangMoi = HoaDon::with('datBan')->latest('created_at')->take(5)->get();

        $rawDoanhThu = HoaDon::selectRaw('MONTH(created_at) as thang, SUM(tong_tien) as tong')
            ->groupBy('thang')
            ->pluck('tong', 'thang')
            ->toArray();

        $labels = array_map(fn($m) => "Tháng $m", array_keys($rawDoanhThu));
        $doanhThuTheoThang = array_values($rawDoanhThu);

        $doanhThuTheoThang = [];
        for ($i = 1; $i <= 6; $i++) {
            $doanhThuTheoThang[] = isset($rawDoanhThu[$i]) ? (int)$rawDoanhThu[$i] : 0;
        }

        $rawDatBan = BanAn::selectRaw('MONTH(created_at) as thang, COUNT(*) as tong')
            ->whereYear('created_at', now()->year)
            ->groupBy('thang')
            ->pluck('tong', 'thang')
            ->toArray();

        $luotDatBanTheoThang = [];
        for ($i = 1; $i <= 6; $i++) {
            $luotDatBanTheoThang[] = isset($rawDatBan[$i]) ? (int)$rawDatBan[$i] : 0;
        }

        // Món bán chạy nhất hôm nay
        $monBanChay = ChiTietOrder::selectRaw('mon_an_id, SUM(so_luong) as tong')
            ->whereDate('created_at', Carbon::today())
            ->groupBy('mon_an_id')
            ->orderByDesc('tong')
            ->take(5)
            ->with('mon')
            ->get();

        // show combo buffet bán chạy
        $comboBanChay = DB::table('dat_ban')
            ->join('hoa_don', 'hoa_don.dat_ban_id', '=', 'dat_ban.id')
            ->join('combo_buffet', 'combo_buffet.id', '=', 'dat_ban.combo_id')
            ->select(
                'combo_buffet.id',
                'combo_buffet.ten_combo',
                DB::raw('COUNT(hoa_don.id) as so_luot_ban'),
                DB::raw('SUM(hoa_don.tong_tien) as tong_doanh_thu')
            )
            ->whereNotNull('dat_ban.combo_id')
            ->groupBy('combo_buffet.id', 'combo_buffet.ten_combo')
            ->orderByDesc('so_luot_ban')
            ->take(4)
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
            'nhanVienMoi',
            'comboBanChay'
        ));
    }
    public function getChartData(Request $request)
    {
        $filter = $request->filter ?? 'month';

        //doanh thu
        if ($filter == 'day') {
            $labels = [];
            $dataTotal = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $labels[] = $date;
                $dataTotal[] = HoaDon::whereDate('created_at', $date)->sum('tong_tien');
            }
        } elseif ($filter == 'month') {
            $labels = [];
            $dataTotal = [];
            for ($i = 1; $i <= 12; $i++) {
                $labels[] = "Tháng $i";
                $dataTotal[] = HoaDon::whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', $i)
                                    ->sum('tong_tien');
            }
        } else {
            $labels = [];
            $dataTotal = [];
            $startYear = now()->year - 5;
            for ($y = $startYear; $y <= now()->year; $y++) {
                $labels[] = $y;
                $dataTotal[] = HoaDon::whereYear('created_at', $y)->sum('tong_tien');
            }
        }

        //doanh thu theo combo
        $comboTypes = ['nguoi_lon', 'tre_em', 'vip', 'khuyen_mai'];
        $comboLabels = ['Người lớn','Trẻ em','VIP','Khuyến mãi'];
        $comboData = [];

        foreach ($comboTypes as $type) {
            $query = DB::table('hoa_don as hd')
                ->join('dat_ban as db', 'hd.dat_ban_id', '=', 'db.id')
                ->join('combo_buffet as cb', 'db.combo_id', '=', 'cb.id')
                ->where('cb.loai_combo', $type);

            if ($filter == 'day') {
                $query->whereBetween('hd.created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()]);
            } elseif ($filter == 'month') {
                $query->whereYear('hd.created_at', now()->year);
            } else {
                $query->whereYear('hd.created_at', '>=', now()->year - 5);
            }

            $comboData[] = $query->sum('hd.tong_tien');
        }

        return response()->json([
            'totalLabels' => $labels,
            'totalData' => $dataTotal,
            'comboLabels' => $comboLabels,
            'comboData' => $comboData,
        ]);
    }
}
