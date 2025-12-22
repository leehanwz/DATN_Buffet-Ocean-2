<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn #{{ $hoaDon->ma_hoa_don }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print {
                display: none !important;
            }

            .print-page {
                page-break-after: always;
            }

            @page {
                size: A4;
                margin: 1cm;
            }

            * {
                color: #000 !important;
                background-color: #fff !important;
                border-color: #000 !important;
            }

            .invoice-table th {
                background-color: #f0f0f0 !important;
            }

            .invoice-table td {
                background-color: #fff !important;
            }
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 14px;
            padding: 10px;
        }

        .invoice-header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .invoice-header h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .invoice-header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .invoice-info {
            margin-bottom: 30px;
        }

        .invoice-info table {
            width: 100%;
        }

        .invoice-info td {
            padding: 5px 10px;
            vertical-align: top;
        }

        .invoice-info td:first-child {
            font-weight: bold;
            width: 150px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 12px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .invoice-table td.text-center {
            text-align: center;
        }

        .invoice-table td.text-end {
            text-align: right;
        }

        .invoice-summary {
            margin-top: 30px;
            margin-left: auto;
            width: 400px;
        }

        .invoice-summary table {
            width: 100%;
        }

        .invoice-summary td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .invoice-summary td:last-child {
            text-align: right;
            font-weight: bold;
        }

        .invoice-summary .total-row {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            font-size: 18px;
            font-weight: bold;
        }

        .invoice-footer {
            margin-top: 50px;
            text-align: center;
        }

        .invoice-footer .signature {
            margin-top: 60px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            body {
                font-size: 12px;
                padding: 5px;
            }

            .container-fluid {
                padding: 0 !important;
            }

            .invoice-header h1 {
                font-size: 18px;
            }

            .invoice-table {
                font-size: 10px;
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid p-4">
        {{-- Nút in --}}
        <div class="no-print text-center mb-3">
            <button onclick="window.print()" class="btn btn-primary btn-lg">
                <i class="bi bi-printer me-2"></i>In hóa đơn
            </button>
            <a href="javascript:window.close()" class="btn btn-secondary btn-lg ms-2">
                <i class="bi bi-x-circle me-2"></i>Đóng
            </a>
        </div>

        {{-- Header --}}
        <div class="invoice-header">
            <h1>HÓA ĐƠN THANH TOÁN</h1>
            <p><strong>Nhà hàng Buffet Ocean</strong></p>
            <p>Địa chỉ: 123 Đường ABC, Quận XYZ, TP.HCM</p>
            <p>Điện thoại: 0123 456 789 | Email: info@buffetocean.com</p>
        </div>

        {{-- Thông tin chung --}}
        <div class="invoice-info">
            <table>
                @php $chiTiet = $hoaDon->chiTietHoaDon; @endphp
                <tr>
                    <td>Mã hóa đơn:</td>
                    <td><strong>{{ $hoaDon->ma_hoa_don }}</strong></td>
                    <td class="text-right">Ngày tạo:</td>
                    <td class="text-right"><strong>{{ $hoaDon->created_at->format('d/m/Y H:i:s') }}</strong></td>
                </tr>
                <tr>
                    <td>Khách hàng:</td>
                    <td>{{ $chiTiet ? $chiTiet->ten_khach : ($hoaDon->datBan->ten_khach ?? 'N/A') }}</td>
                    <td class="text-right">Bàn số:</td>
                    <td class="text-right">
                        <strong>{{ $chiTiet ? $chiTiet->ban_so : ($hoaDon->datBan->banAn->so_ban ?? 'N/A') }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>SĐT:</td>
                    <td>{{ $chiTiet ? $chiTiet->sdt_khach : ($hoaDon->datBan->sdt_khach ?? 'N/A') }}</td>
                    <td class="text-right">Số khách:</td>
                    <td class="text-right">
                        <strong>{{ $chiTiet ? $chiTiet->so_khach : ($hoaDon->datBan->so_khach ?? 'N/A') }}</strong>
                        <br><small style="font-size: 11px;">(Người lớn: {{ $hoaDon->datBan->nguoi_lon ?? 0 }}, Trẻ em:
                            {{ $hoaDon->datBan->tre_em ?? 0 }})</small>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $chiTiet ? $chiTiet->email_khach : ($hoaDon->datBan->email_khach ?? 'N/A') }}</td>
                    <td class="text-right">Khu vực:</td>
                    <td class="text-right">
                        <strong>{{ $chiTiet ? ($chiTiet->khu_vuc . ($chiTiet->tang ? ' - Tầng ' . $chiTiet->tang : '')) : ($hoaDon->datBan->banAn->khuVuc->ten_khu_vuc ?? 'N/A') }}</strong>
                    </td>
                </tr>

                @if($chiTiet && $chiTiet->gio_vao)
                <tr>
                    <td>Giờ vào:</td>
                    <td><strong>{{ $chiTiet->gio_vao->format('d/m/Y H:i') }}</strong></td>
                    <td class="text-right">Giờ ra:</td>
                    <td class="text-right"><strong>{{ $chiTiet->gio_ra->format('d/m/Y H:i') }}</strong></td>
                </tr>
                <tr>
                    <td>Thời gian phục vụ:</td>
                    <td><strong>{{ floor($chiTiet->thoi_gian_phuc_vu_phut / 60) }} giờ
                            {{ $chiTiet->thoi_gian_phuc_vu_phut % 60 }} phút</strong></td>
                    <td class="text-right">Mã đặt bàn:</td>
                    <td class="text-right"><strong>{{ $chiTiet->ma_dat_ban ?? 'N/A' }}</strong></td>
                </tr>
                @elseif(isset($gioVao) && $gioVao)
                <tr>
                    <td>Giờ vào:</td>
                    <td><strong>{{ $gioVao->format('d/m/Y H:i') }}</strong></td>
                    <td class="text-right">Giờ ra:</td>
                    <td class="text-right"><strong>{{ $gioRa->format('d/m/Y H:i') }}</strong></td>
                </tr>
                <tr>
                    <td>Thời gian phục vụ:</td>
                    <td><strong>{{ floor($thoiGianPhucVu / 60) }} giờ {{ $thoiGianPhucVu % 60 }} phút</strong></td>
                    <td class="text-right">Mã đặt bàn:</td>
                    <td class="text-right"><strong>{{ $hoaDon->datBan->ma_dat_ban ?? 'N/A' }}</strong></td>
                </tr>
                @endif

                <tr>
                    <td>Phương thức TT:</td>
                    <td>
                        <strong>
                            @if($hoaDon->trang_thai == 'chua_thanh_toan' || $hoaDon->phuong_thuc_tt ==
                            'chua_thanh_toan')
                            Chưa thanh toán
                            @elseif($hoaDon->phuong_thuc_tt == 'tien_mat')
                            Tiền mặt
                            @elseif($hoaDon->phuong_thuc_tt == 'chuyen_khoan')
                            Chuyển khoản
                            @elseif($hoaDon->phuong_thuc_tt == 'the_ATM')
                            Thẻ ATM
                            @elseif($hoaDon->phuong_thuc_tt == 'vnpay')
                            VNPay
                            @else
                            {{ $hoaDon->phuong_thuc_tt }}
                            @endif
                        </strong>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        {{-- Bảng chi tiết --}}
        <table class="invoice-table">
            <thead>
                <tr>
                    <th style="width: 5%;">STT</th>
                    <th style="width: 35%;">Tên món</th>
                    <th style="width: 10%;" class="text-center">Số lượng</th>
                    <th style="width: 15%;" class="text-center">Trạng thái</th>
                    <th style="width: 17.5%;" class="text-end">Đơn giá</th>
                    <th style="width: 17.5%;" class="text-end">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                // --- KHỞI TẠO DỮ LIỆU AN TOÀN ---
                $monAnList = collect();

                if(isset($hoaDon->datBan->orderMon)) {
                foreach($hoaDon->datBan->orderMon as $order) {
                if(isset($order->chiTietOrders)) {
                foreach($order->chiTietOrders as $ct) {
                $monAnList->push($ct);
                }
                }
                }
                }

                // Tính tổng giới hạn cho từng món
                $tongGioiHanMon = [];
                $phuPhiMon = [];

                if(isset($hoaDon->datBan->chiTietDatBan)) {
                foreach($hoaDon->datBan->chiTietDatBan as $chiTietCombo) {
                if($chiTietCombo->combo) {
                $monTrongCombo = \App\Models\MonTrongCombo::where('combo_id', $chiTietCombo->combo->id)->get();
                foreach($monTrongCombo as $mtc) {
                $monAnId = $mtc->mon_an_id;
                $gioiHan = $mtc->gioi_han_so_luong ?? null;
                if($gioiHan !== null && $gioiHan > 0) {
                $soLuongCombo = $chiTietCombo->so_luong ?? 1;
                if(!isset($tongGioiHanMon[$monAnId])) {
                $tongGioiHanMon[$monAnId] = 0;
                $phuPhiMon[$monAnId] = $mtc->phu_phi_goi_them ?? 0;
                }
                $tongGioiHanMon[$monAnId] += $gioiHan * $soLuongCombo;
                }
                }
                }
                }
                }

                // Nhóm món (Fix lỗi string given)
                $monAnGrouped = $monAnList->count() > 0 ? $monAnList->groupBy('mon_an_id') : collect();

                // Thiết lập biến hiển thị
                $chiTiet = $hoaDon->chiTietHoaDon;
                if ($chiTiet) {
                $tongTienCombo = $chiTiet->tong_tien_combo ?? 0;
                $tongTienMonGoiThem = $chiTiet->tong_tien_mon_goi_them ?? 0;
                $tongTienComboMon = $chiTiet->tong_tien_combo_mon ?? $hoaDon->tong_tien ?? 0;
                $stt = 1;
                } else {
                $stt = 1;
                $tongTienCombo = 0;
                $tongTienMonGoiThem = 0;
                $tongTienComboMon = $hoaDon->tong_tien ?? 0;
                }
                @endphp

                @if($chiTiet && $chiTiet->danh_sach_mon)
                {{-- 1. HIỂN THỊ COMBO (Sử dụng chi_tiet_hoa_don) --}}
                @if($chiTiet->tong_tien_combo > 0)
                @php
                $soTreEm = $hoaDon->datBan->tre_em ?? 0;
                $soNguoiDaXuLy = 0;
                @endphp
                @foreach($hoaDon->datBan->chiTietDatBan as $chiTietCombo)
                @if($chiTietCombo->combo)
                @php
                // Logic tính giá combo (đã sửa lỗi cú pháp tại đây)
                $giaComboGoc = $chiTietCombo->combo->gia_co_ban;
                $soLuongCombo = $chiTietCombo->so_luong ?? 1;
                $soNguoiDuocGiam = 0;

                if($soTreEm > 0 && $soNguoiDaXuLy < $soTreEm) { // Số người được giảm=min(số trẻ em còn lại, số lượng combo này)
                    $soTreEmConLai=$soTreEm - $soNguoiDaXuLy; $soNguoiDuocGiam=min($soTreEmConLai,
                    $soLuongCombo); } $soNguoiKhongGiam=$soLuongCombo - $soNguoiDuocGiam; $thanhTienCombo=($giaComboGoc
                    * 0.5 * $soNguoiDuocGiam) + ($giaComboGoc * $soNguoiKhongGiam); $soNguoiDaXuLy +=$soLuongCombo;
                    @endphp <tr>
                    <td class="text-center" data-label="STT">{{ $stt++ }}</td>
                    <td data-label="Tên món">
                        <strong>{{ $chiTietCombo->combo->ten_combo }}</strong> (Combo chính)
                        @if($soNguoiDuocGiam > 0)
                        <span style="padding: 2px 6px; border: 1px solid #000; font-size: 10px; margin-left: 5px;">Trẻ
                            em (Giảm 50%)</span>
                        @endif
                    </td>
                    <td class="text-center" data-label="Số lượng">
                        {{ $soLuongCombo }} khách
                        @if($soNguoiKhongGiam > 0 || $soNguoiDuocGiam > 0)
                        <br><small style="font-size: 10px;">(Người lớn: {{ $soNguoiKhongGiam }}, Trẻ em:
                            {{ $soNguoiDuocGiam }})</small>
                        @endif
                    </td>
                    <td class="text-center" data-label="Trạng thái">-</td>
                    <td class="text-end" data-label="Đơn giá">
                        @if($soNguoiDuocGiam > 0)
                        <div>Người lớn: {{ number_format($giaComboGoc) }} đ/người</div>
                        <div>Trẻ em (50%): {{ number_format($giaComboGoc * 0.5) }} đ/người</div>
                        @else
                        {{ number_format($giaComboGoc) }} đ/người
                        @endif
                    </td>
                    <td class="text-end" data-label="Thành tiền">
                        <strong>{{ number_format($thanhTienCombo) }} đ</strong>
                    </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
{{-- 2. HIỂN THỊ DANH SÁCH MÓN ĂN --}}
@php
$tongTienMonGoiThemTinhLai = 0;
$sttMon = 1;
@endphp
@foreach($monAnGrouped as $monAnId => $monAnGroup)
@php
$ctFirst = $monAnGroup->first();
$tongSoLuong = $monAnGroup->sum('so_luong');

// --- SỬA LỖI JSON STRING ---
$monInfo = null;
$dsMon = $chiTiet->danh_sach_mon ?? [];

// Kiểm tra nếu dữ liệu là chuỗi JSON thì giải mã (decode) ra mảng
if (is_string($dsMon)) {
$dsMon = json_decode($dsMon, true);
}

// Chỉ lặp khi đã là mảng hoặc object
if (is_array($dsMon) || is_object($dsMon)) {
foreach($dsMon as $mon) {
if($ctFirst->monAn && $ctFirst->monAn->ten_mon == ($mon['ten_mon'] ?? '')) {
$monInfo = $mon;
break;
}
}
}
// ---------------------------

// Tính toán trạng thái (Logic cũ giữ nguyên)
$soLuongDaLen = 0; $soLuongChoBep = 0; $soLuongDangCheBien = 0; $soLuongChuaNauXong = 0; $soLuongHuy = 0;

// Biến cho món vượt
$soLuongDaLenTrongVuot = 0; $soLuongChuaNauXongTrongVuot = 0;
$soLuongDangCheBienTrongVuot = 0; $soLuongChoBepTrongVuot = 0;

if($monAnGroup) {
$tongSoLuong = $monAnGroup->sum('so_luong');
$tongGioiHan = $tongGioiHanMon[$monAnId] ?? null;
$soLuongVuot = 0;
if($tongGioiHan !== null && $tongGioiHan > 0) {
$soLuongVuot = max(0, $tongSoLuong - $tongGioiHan);
}

foreach($monAnGroup as $ct) {
if($ct->trang_thai == 'da_len_mon') $soLuongDaLen += $ct->so_luong;
elseif($ct->trang_thai == 'cho_bep') { $soLuongChoBep += $ct->so_luong; $soLuongChuaNauXong += $ct->so_luong; }
elseif($ct->trang_thai == 'dang_che_bien') { $soLuongDangCheBien += $ct->so_luong; $soLuongChuaNauXong += $ct->so_luong;
}
elseif($ct->trang_thai == 'huy_mon') $soLuongHuy += $ct->so_luong;
}

if($soLuongVuot > 0) {
$soLuongDaLenTrongVuot = max(0, $soLuongDaLen - $tongGioiHan);
$soLuongChuaNauXongTrongVuot = $soLuongVuot - $soLuongDaLenTrongVuot;
$soLuongConLaiTrongVuot = $soLuongChuaNauXongTrongVuot;
$soLuongDangCheBienTrongVuot = min($soLuongDangCheBien, $soLuongConLaiTrongVuot);
$soLuongChoBepTrongVuot = $soLuongConLaiTrongVuot - $soLuongDangCheBienTrongVuot;
}
}

if($soLuongDaLen == 0 && $soLuongDangCheBien == 0) continue;

$donGiaGoc = $monAnGroup->first()->monAn->gia ?? 0;
$coMonChuaNauXong = $soLuongChuaNauXong > 0 || $soLuongChuaNauXongTrongVuot > 0;
$coTrongCombo = $monInfo['la_mon_combo'] ?? false;
$soLuongVuot = $monInfo['so_luong_vuot'] ?? 0;
$tongSoLuongHienThi = $monAnGroup ? $monAnGroup->sum('so_luong') : ($mon['so_luong'] ?? 0);

// Tính lại phụ phí
$tienPhuPhiTinhLai = 0;
$phuPhiDonVi = $phuPhiMon[$monAnId] ?? 0;
if($coTrongCombo && $soLuongVuot > 0 && $phuPhiDonVi > 0) {
$tienPhuPhiTinhLai = $phuPhiDonVi * $soLuongDaLenTrongVuot;
}

// Tính lại thành tiền
$thanhTienTinhLai = 0;
if($coTrongCombo) {
if($soLuongVuot > 0) {
$tienMonDaLenTrongVuot = $donGiaGoc * $soLuongDaLenTrongVuot;
$tienMonDangCheBienTrongVuot = $donGiaGoc * $soLuongDangCheBienTrongVuot;
$thanhTienTinhLai = $tienMonDaLenTrongVuot + $tienMonDangCheBienTrongVuot + $tienPhuPhiTinhLai;
}
} else {
$tienMonDaLen = $donGiaGoc * $soLuongDaLen;
$tienMonDangCheBien = $donGiaGoc * $soLuongDangCheBien;
$thanhTienTinhLai = $tienMonDaLen + $tienMonDangCheBien;
}
@endphp
<tr>
    <td class="text-center" data-label="STT">{{ $sttMon++ }}</td>
    <td data-label="Tên món">
        {{ $ctFirst->monAn->ten_mon ?? 'N/A' }}
        @if($coTrongCombo)
        <span style="font-size: 11px;">(Món combo)</span>
        @if($monInfo && ($monInfo['vuot_gioi_han'] ?? false))
        <span style="font-size: 11px;">(Vượt giới hạn)</span>
        @endif
        @else
        <span style="font-size: 11px;">(Gọi thêm)</span>
        @endif
    </td>
    <td class="text-center" data-label="Số lượng">
        {{ $tongSoLuong }}
        @if($monInfo && isset($monInfo['gioi_han']) && $monInfo['gioi_han'] !== null)
        <br><small style="font-size: 10px;">(Giới hạn: {{ $monInfo['gioi_han'] }})</small>
        @endif
    </td>
    <td class="text-center" data-label="Trạng thái">
        @if($monAnGroup)
        @php $tongSoLuongKhongHuy = $tongSoLuongHienThi - $soLuongHuy; @endphp
        @if($soLuongHuy > 0 && $soLuongHuy == $tongSoLuongHienThi)
        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
            <span style="font-size: 11px; font-weight: bold;">Đã hủy: {{ $soLuongHuy }}/{{ $tongSoLuongHienThi }}</span>
        </div>
        @elseif($soLuongDaLen == $tongSoLuongKhongHuy && $soLuongHuy == 0 && $soLuongDangCheBien == 0 && $soLuongChoBep
        == 0)
        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
            <span style="font-size: 11px; font-weight: bold;">Đã lên:
                {{ $soLuongDaLen }}/{{ $tongSoLuongHienThi }}</span>
        </div>
        @else
        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
            @if($soLuongDaLen > 0) <span style="font-size: 11px; font-weight: bold;">Đã lên: {{ $soLuongDaLen }}</span>
            @endif
            @if($soLuongDangCheBien > 0) <span style="font-size: 11px; font-weight: bold;">Đang nấu:
                {{ $soLuongDangCheBien }}</span> @endif
            @if($soLuongChoBep > 0) <span style="font-size: 11px; font-weight: bold;">Chờ bếp:
                {{ $soLuongChoBep }}</span> @endif
            @if($soLuongHuy > 0) <span style="font-size: 11px; font-weight: bold;">Đã hủy: {{ $soLuongHuy }}</span>
            @endif
        </div>
        @endif
        @else
        <span style="font-size: 11px;">N/A</span>
        @endif
    </td>
    <td class="text-end" data-label="Đơn giá">
        @if($soLuongHuy > 0 && $soLuongHuy == $tongSoLuongHienThi)
        <span>0 đ</span><br><small style="font-size: 11px;">(Đã hủy)</small>
        @elseif($coTrongCombo && $soLuongVuot == 0)
        <span>0 đ</span><br><small style="font-size: 11px;">(Đã bao gồm trong combo)</small>
        @if($soLuongHuy > 0) <br><small style="font-size: 10px;">Đã hủy ({{ $soLuongHuy }}): 0 đ</small> @endif
        @elseif($monInfo && ($monInfo['don_gia'] ?? 0) > 0 || $coMonChuaNauXong || $soLuongVuot > 0)
        <div style="font-size: 11px; line-height: 1.4;">
            <div><small>Giá gốc: {{ number_format($donGiaGoc) }} đ</small></div>
            @if($soLuongHuy > 0) <div><small>Đã hủy ({{ $soLuongHuy }}): 0 đ</small></div> @endif
            @if($coMonChuaNauXong)
            <div style="margin-top: 4px;">
                @if($coTrongCombo && $soLuongVuot > 0)
                @if($soLuongDaLenTrongVuot > 0) Đã nấu xong ({{ $soLuongDaLenTrongVuot }}): 100% =
                {{ number_format($donGiaGoc * $soLuongDaLenTrongVuot) }} đ @endif
                @elseif(!$coTrongCombo)
                @if($soLuongDaLen > 0) Đã nấu xong ({{ $soLuongDaLen }}): 100% =
                {{ number_format($donGiaGoc * $soLuongDaLen) }} đ @endif
                @endif
            </div>
            @endif
            @if($tienPhuPhiTinhLai > 0)
            <div style="margin-top: 4px;">+ {{ number_format($tienPhuPhiTinhLai) }} đ (phụ phí)
                @if($soLuongDaLenTrongVuot > 1 && $phuPhiDonVi > 0) <br><small
                    style="font-size: 10px;">({{ number_format($phuPhiDonVi) }} đ ×
                    {{ $soLuongDaLenTrongVuot }})</small> @endif
            </div>
            @endif
        </div>
        @else
        @if($tienPhuPhiTinhLai > 0)
        <span>0 đ</span><br><small style="font-size: 11px;">+ {{ number_format($tienPhuPhiTinhLai) }} đ (phụ
            phí)</small>
        @else
        <span>0 đ</span><br><small style="font-size: 11px;">(Đã bao gồm trong combo)</small>
        @endif
        @endif
    </td>
    <td class="text-end" data-label="Thành tiền">
        @if($soLuongHuy > 0 && isset($tongSoLuongHienThi) && $soLuongHuy == $tongSoLuongHienThi)
        <span style="font-weight: bold;">0 đ</span>
        @elseif($thanhTienTinhLai > 0)
        <strong>{{ number_format($thanhTienTinhLai) }} đ</strong>
        @php $tongTienMonGoiThemTinhLai += $thanhTienTinhLai; @endphp
        @else
        <span>0 đ</span>
        @endif
    </td>
</tr>
@endforeach

                    @php
                    if($chiTiet) {
                    $tongTienCombo = $chiTiet->tong_tien_combo ?? 0;
                    $tongTienMonGoiThem = $chiTiet->tong_tien_mon_goi_them ?? 0;
                    $tongTienComboMon = $chiTiet->tong_tien_combo_mon ?? $hoaDon->tong_tien ?? 0;
                    } else {
                    $tongTienMonGoiThem = $tongTienMonGoiThemTinhLai;
                    $tongTienComboMon = $tongTienCombo + $tongTienMonGoiThem;
                    }
                    @endphp

                    {{-- Tổng kết các phần --}}
                    @if($tongTienCombo > 0)
                    <tr style="background-color: #f0f0f0; font-weight: bold;">
                        <td colspan="5" class="text-end">Tổng tiền combo chính:</td>
                        <td class="text-end">{{ number_format($tongTienCombo) }} đ</td>
                    </tr>
                    @endif
                    @if($tongTienMonGoiThem > 0)
                    <tr style="background-color: #f0f0f0; font-weight: bold;">
                        <td colspan="5" class="text-end">Tổng tiền món gọi thêm:</td>
                        <td class="text-end">{{ number_format($tongTienMonGoiThem) }} đ</td>
                    </tr>
                    @endif
                    <tr style="background-color: #e0e0e0; font-weight: bold; font-size: 16px;">
                        <td colspan="5" class="text-end">TỔNG CỘNG:</td>
                        <td class="text-end">{{ number_format($tongTienComboMon) }} đ</td>
                    </tr>

                    @else
                    {{-- 3. FALLBACK CHO HÓA ĐƠN CŨ --}}
                    @php
                    $tongTienComboMon = $hoaDon->tong_tien ?? 0;
                    $tongTienThucTeTinhLai = $tongTienComboMon;
                    $soTreEm = $hoaDon->datBan->tre_em ?? 0;
                    $soNguoiDaXuLy = 0;
                    @endphp

                    @if($hoaDon->datBan->chiTietDatBan && $hoaDon->datBan->chiTietDatBan->count() > 0)
                    @foreach($hoaDon->datBan->chiTietDatBan as $chiTietCombo)
                    @if($chiTietCombo->combo)
                    @php
                    $giaComboGoc = $chiTietCombo->combo->gia_co_ban;
                    $soLuongCombo = $chiTietCombo->so_luong ?? 1;
                    $soNguoiDuocGiam = 0;
                    if($soTreEm > 0 && $soNguoiDaXuLy < $soTreEm) { $soTreEmConLai=$soTreEm - $soNguoiDaXuLy;
                        $soNguoiDuocGiam=min($soTreEmConLai, $soLuongCombo); } $soNguoiKhongGiam=$soLuongCombo -
                        $soNguoiDuocGiam; $thanhTienCombo=($giaComboGoc * 0.5 * $soNguoiDuocGiam) + ($giaComboGoc *
                        $soNguoiKhongGiam); $soNguoiDaXuLy +=$soLuongCombo; @endphp <tr>
                        <td class="text-center" data-label="STT">{{ $stt++ }}</td>
                        <td data-label="Tên món">
                            <strong>{{ $chiTietCombo->combo->ten_combo }}</strong> (Combo chính)
                            @if($soNguoiDuocGiam > 0)
                            <span
                                style="padding: 2px 6px; border: 1px solid #000; font-size: 10px; margin-left: 5px;">Trẻ
                                em (Giảm 50%)</span>
                            @endif
                        </td>
                        <td class="text-center" data-label="Số lượng">
                            {{ $soLuongCombo }} khách
                            @if($soNguoiKhongGiam > 0 || $soNguoiDuocGiam > 0)
                            <br><small style="font-size: 10px;">(Người lớn: {{ $soNguoiKhongGiam }}, Trẻ em:
                                {{ $soNguoiDuocGiam }})</small>
                            @endif
                        </td>
                        <td class="text-center" data-label="Trạng thái">-</td>
                        <td class="text-end" data-label="Đơn giá">
                            @if($soNguoiDuocGiam > 0)
                            <div>Người lớn: {{ number_format($giaComboGoc) }} đ/người</div>
                            <div>Trẻ em (50%): {{ number_format($giaComboGoc * 0.5) }} đ/người</div>
                            @else
                            {{ number_format($giaComboGoc) }} đ/người
                            @endif
                        </td>
                        <td class="text-end" data-label="Thành tiền">
                            <strong>{{ number_format($thanhTienCombo) }} đ</strong>
                        </td>
                        </tr>
                        @endif
                        @endforeach
                        @elseif($hoaDon->datBan->comboBuffet)
                        {{-- Logic cho combo đơn lẻ cũ --}}
                        @php
                        $combo = $hoaDon->datBan->comboBuffet;
                        $soKhach = $hoaDon->datBan->so_khach ?? 1;
                        $soNguoiLon = $hoaDon->datBan->nguoi_lon ?? $soKhach;
                        $soTreEm = $hoaDon->datBan->tre_em ?? 0;
                        $giaComboGoc = $combo->gia_co_ban;
                        $giaComboTreEm = $giaComboGoc * 0.5;
                        $thanhTienCombo = ($giaComboGoc * $soNguoiLon) + ($giaComboTreEm * $soTreEm);
                        @endphp
                        <tr>
                            <td class="text-center" data-label="STT">{{ $stt++ }}</td>
                            <td data-label="Tên món">
                                <strong>{{ $combo->ten_combo }}</strong> (Combo chính)
                                @if($soTreEm > 0)
                                <span
                                    style="padding: 2px 6px; border: 1px solid #000; font-size: 10px; margin-left: 5px;">Trẻ
                                    em (Giảm 50%)</span>
                                @endif
                            </td>
                            <td class="text-center" data-label="Số lượng">{{ $soKhach }} khách</td>
                            <td class="text-center" data-label="Trạng thái">-</td>
                            <td class="text-end" data-label="Đơn giá">
                                @if($soTreEm > 0)
                                <div>Người lớn: {{ number_format($giaComboGoc) }} đ/người</div>
                                <div>Trẻ em (50%): {{ number_format($giaComboTreEm) }} đ/người</div>
                                @else
                                {{ number_format($giaComboGoc) }} đ/người
                                @endif
                            </td>
                            <td class="text-end" data-label="Thành tiền"><strong>{{ number_format($thanhTienCombo) }}
                                    đ</strong></td>
                        </tr>
                        @endif
                        <tr style="background-color: #e0e0e0; font-weight: bold; font-size: 16px;">
                            <td colspan="5" class="text-end">TỔNG CỘNG:</td>
                            <td class="text-end">{{ number_format($tongTienThucTeTinhLai) }} đ</td>
                        </tr>
                        @endif
            </tbody>
        </table>

        {{-- Tóm tắt thanh toán --}}
        <div class="invoice-summary">
            <table>
                @php
                if ($chiTiet) {
                $tongTienComboMon = $chiTiet->tong_tien_combo_mon ?? $hoaDon->tong_tien ?? 0;
                $tongTienSauVoucher = $chiTiet->tong_tien_sau_voucher ?? ($tongTienComboMon -
                ($chiTiet->tien_giam_voucher ?? 0));
                if($tongTienSauVoucher < 0) $tongTienSauVoucher=0; $phaiThanhToan=$chiTiet->phai_thanh_toan ??
                    ($tongTienSauVoucher - ($chiTiet->tien_coc ?? 0));
                    if($phaiThanhToan < 0) $phaiThanhToan=0; } else { $tongTienComboMon=$tongTienThucTeTinhLai ?? 0;
                        $tongTienSauVoucher=$tongTienComboMon - ($hoaDon->tien_giam ?? 0);
                        $phaiThanhToan = $tongTienSauVoucher - ($hoaDon->datBan->tien_coc ?? 0);
                        if($phaiThanhToan < 0) $phaiThanhToan=0; } @endphp <tr>
                            <td>Tổng tiền (Combo + Món):</td>
                            <td>{{ number_format($tongTienComboMon) }} đ</td>
                            </tr>
                            @if(($chiTiet && $chiTiet->tien_giam_voucher > 0) || (!$chiTiet && $hoaDon->voucher))
                            <tr>
                                <td>(-) Tiền giảm (Voucher
                                    {{ $chiTiet ? $chiTiet->ma_voucher : ($hoaDon->voucher->ma_voucher ?? '') }}):</td>
                                <td>-
                                    {{ number_format($chiTiet ? $chiTiet->tien_giam_voucher : ($hoaDon->tien_giam ?? 0)) }}
                                    đ</td>
                            </tr>
                            <tr style="background-color: #f0f0f0;">
                                <td style="font-weight: bold;">Tổng tiền sau voucher:</td>
                                <td style="font-weight: bold;">{{ number_format($tongTienSauVoucher) }} đ</td>
                            </tr>
                            @endif

                            @if(($chiTiet && $chiTiet->tien_coc > 0) || (!$chiTiet && $hoaDon->datBan->tien_coc > 0))
                            <tr>
                                <td>(-) Tiền cọc:</td>
                                <td>-
                                    {{ number_format($chiTiet ? $chiTiet->tien_coc : ($hoaDon->datBan->tien_coc ?? 0)) }}
                                    đ</td>
                            </tr>
                            @endif

                            <tr class="total-row">
                                <td>PHẢI THANH TOÁN:</td>
                                <td>{{ number_format($phaiThanhToan) }} đ</td>
                            </tr>
                            <tr>
                                <td>Đã thanh toán:</td>
                                <td style="font-size: 16px;">
                                    @if($hoaDon->trang_thai == 'chua_thanh_toan')
                                    {{ number_format(0) }} đ
                                    @else
                                    {{ number_format($hoaDon->da_thanh_toan ?? $phaiThanhToan) }} đ
                                    @endif
                                </td>
                            </tr>

                            @php
                            $tienKhachDua = $chiTiet->tien_khach_dua ?? null;
                            $tienTraLai = $chiTiet->tien_tra_lai ?? 0;
                            $phuongThucTT = $chiTiet ? ($chiTiet->phuong_thuc_tt ?? null) : ($hoaDon->phuong_thuc_tt ??
                            null);
                            @endphp

                            @if($tienKhachDua && $tienKhachDua > 0 && $phuongThucTT == 'tien_mat')
                            <tr>
                                <td>Tiền khách đưa:</td>
                                <td>{{ number_format($tienKhachDua) }} đ</td>
                            </tr>
                            @if($tienTraLai > 0)
                            <tr>
                                <td style="font-weight: bold;">Tiền trả lại:</td>
                                <td style="font-weight: bold;">{{ number_format($tienTraLai) }} đ</td>
                            </tr>
                            @elseif($tienKhachDua < $phaiThanhToan) <tr>
                                <td style="font-weight: bold;">Thiếu:</td>
                                <td style="font-weight: bold;">{{ number_format($phaiThanhToan - $tienKhachDua) }} đ
                                </td>
                                </tr>
                                @endif
                                @endif
            </table>
        </div>

        {{-- Footer --}}
        <div class="invoice-footer">
            <p><em>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi!</em></p>
            <p><em>Hẹn gặp lại quý khách lần sau.</em></p>
            <div class="signature">
                <table style="width: 100%; margin-top: 40px;">
                    <tr>
                        <td style="text-align: center; width: 50%;">
                            <p><strong>Người lập</strong></p>
                            <p style="margin-top: 50px;">(Ký, ghi rõ họ tên)</p>
                        </td>
                        <td style="text-align: center; width: 50%;">
                            <p><strong>Khách hàng</strong></p>
                            <p style="margin-top: 50px;">(Ký, ghi rõ họ tên)</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            if (window.opener) {
                setTimeout(function() { window.print(); }, 500);
            }
        };
    </script>
</body>

</html>