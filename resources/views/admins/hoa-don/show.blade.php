@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết hóa đơn')

@section('content')
<main class="app-content">
    <div class="app-title d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fa fa-file-invoice-dollar"></i> Hóa đơn #{{ $hoaDon->ma_hoa_don }}</h1>
        <a href="{{ route('admin.hoa-don.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>

    @php
        // ----- PHẦN TÍNH TOÁN LOGIC TRƯỚC KHI HIỂN THỊ -----
        
        // 1. Lấy thông tin Combo chính
        $combo = $hoaDon->datBan->comboBuffet;
        $soKhach = $hoaDon->datBan->so_khach;
        $giaComboChinh = 0;
        $tenCombo = "Không có combo";

        if ($combo) {
            $giaComboChinh = $soKhach * $combo->gia_co_ban;
            $tenCombo = $combo->ten_combo;
        }

        // 2. Lọc và tính tiền các Món Gọi Thêm
        $monGoiThem = [];
        $tongTienGoiThem = 0;
        $monAnTrongCombo = []; // Danh sách các món ăn thuộc combo (để liệt kê)

        foreach($hoaDon->datBan->orderMon as $order) {
            foreach($order->chiTietOrders as $ct) {
                // Chỉ tính tiền cho các món 'goi_them' và không bị hủy
                if ($ct->loai_mon == 'goi_them' && $ct->trang_thai != 'huy_mon') {
                    $monGoiThem[] = $ct; // Thêm vào danh sách để hiển thị
                    $tongTienGoiThem += ($ct->monAn->gia ?? 0) * $ct->so_luong;
                } else {
                    $monAnTrongCombo[] = $ct; // Thêm vào danh sách món combo
                }
            }
        }
        
        // 3. Suy ra Phụ phí (vượt số lượng,...)
        // Phí này = Tổng hóa đơn - Tiền Combo - Tiền Gọi Thêm
        $phuPhiKhac = (float)($hoaDon->tong_tien) - $giaComboChinh - $tongTienGoiThem;
        
        // Đôi khi có sai số nhỏ (ví dụ 0.00001), làm tròn về 0 nếu quá nhỏ
        if (abs($phuPhiKhac) < 0.01) {
            $phuPhiKhac = 0;
        }
    @endphp

    <div class="row">
        <div class="col-md-5">
            <div class="tile mb-4">
                <h3 class="tile-title">Thông tin Đặt bàn</h3>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between">
                        <strong>Khách hàng:</strong>
                        <span>{{ $hoaDon->datBan->ten_khach ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between">
                        <strong>Bàn:</strong>
                        <span>{{ $hoaDon->datBan->banAn->so_ban ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between">
                        <strong>Số khách:</strong>
                        <span>{{ $soKhach ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between">
                        <strong>Phương thức TT:</strong>
                        <span class="badge bg-primary">{{ $hoaDon->phuong_thuc_tt ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between">
                        <strong>Ngày tạo:</strong>
                        <span>{{ $hoaDon->created_at?->format('d/m/Y H:i') ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <div class="tile">
                <h3 class="tile-title">Chi tiết Thanh toán</h3>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between">
                        <span>Tổng tiền món:</span>
                        <span>{{ number_format($hoaDon->tong_tien ?? 0) }}₫</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between text-muted">
                        <span>(-) Tiền cọc:</span>
                        <span>{{ number_format($hoaDon->datBan->tien_coc ?? 0) }}₫</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between text-success">
                        <span>(-) Voucher:</span>
                        <span>
                            @if($hoaDon->voucher)
                                {{ $hoaDon->voucher->ma_voucher }}
                            @else
                                Không áp dụng
                            @endif
                        </span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between text-success">
                        <span>(-) Tiền giảm:</span>
                        <span>{{ number_format($hoaDon->tien_giam ?? 0) }}₫</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between text-danger">
                        <span>(+) Phụ thu:</span>
                        <span>{{ number_format($hoaDon->phu_thu ?? 0) }}₫</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between fw-bold fs-5 bg-light">
                        <span>Phải thanh toán:</span>
                        <span>{{ number_format($hoaDon->tinhDaThanhToan()) }}₫</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between fw-bold fs-5 text-success">
                        <span>Đã thanh toán:</span>
                        <span>{{ number_format($hoaDon->da_thanh_toan ?? 0) }}₫</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="tile">
                <h3 class="tile-title">Giải thích "Tổng tiền món" ({{ number_format($hoaDon->tong_tien ?? 0) }}₫)</h3>
                
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Hạng mục</th>
                                <th class="text-end">Số lượng</th>
                                <th class="text-end">Đơn giá</th>
                                <th class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($combo)
                            <tr class="table-success">
                                <td class="fw-bold">{{ $tenCombo }}</td>
                                <td class="text-end">{{ $soKhach }} (khách)</td>
                                <td class="text-end">{{ number_format($combo->gia_co_ban) }}₫</td>
                                <td class="text-end fw-bold">{{ number_format($giaComboChinh) }}₫</td>
                            </tr>
                            @endif

                            @if(count($monGoiThem) > 0)
                            <tr class="table-secondary">
                                <td colspan="4" class="fw-bold fst-italic">Món gọi thêm</td>
                            </tr>
                            @foreach($monGoiThem as $ct)
                            <tr>
                                <td>{{ $ct->monAn->ten_mon ?? 'N/A' }}</td>
                                <td class="text-end">{{ $ct->so_luong }}</td>
                                <td class="text-end">{{ number_format($ct->monAn->gia ?? 0) }}₫</td>
                                <td class="text-end">{{ number_format(($ct->monAn->gia ?? 0) * $ct->so_luong) }}₫</td>
                            </tr>
                            @endforeach
                            @endif
                            
                            @if($phuPhiKhac > 0)
                            <tr class="table-warning">
                                <td><em>Phụ phí (vượt số lượng combo,...)</em></td>
                                <td class="text-end">—</td>
                                <td class="text-end">—</td>
                                <td class="text-end">{{ number_dot($phuPhiKhac) }}₫</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot class="table-light">
                            <tr class="fw-bold fs-5">
                                <td colspan="3" class="text-end">TỔNG TIỀN MÓN:</td>
                                <td class="text-end">{{ number_format($hoaDon->tong_tien ?? 0) }}₫</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <h5 class="mt-4">Các món đã gọi (trong combo):</h5>
                <div class->
                    @if(count($monAnTrongCombo) > 0)
                        @foreach($monAnTrongCombo as $ct)
                            <span class="badge bg-light text-dark m-1 border">
                                {{ $ct->monAn->ten_mon ?? '?' }} (SL: {{ $ct->so_luong }})
                            </span>
                        @endforeach
                    @else
                        <span classD="text-muted small">Không có món nào được ghi nhận.</span>
                    @endif
                </div>

            </div>
        </div>
    </div>
</main>
@endsection