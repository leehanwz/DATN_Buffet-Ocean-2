@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách hóa đơn')

@section('content')
<main class="app-content">
    <div class="app-title d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fa fa-file-invoice"></i> Danh sách hóa đơn</h1>
        <a href="{{ route('admin.hoa-don.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tạo hóa đơn mới
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($hoadons->isEmpty())
    <div class="alert alert-info">Chưa có hóa đơn nào.</div>
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Mã hóa đơn</th>
                    <th>Bàn / Khách</th>
                    <th>Tổng tiền món</th>
                    <th>Tiền giảm</th>
                    <th>Phụ thu</th>
                    <th>Đã thanh toán</th>
                    <th>Phương thức</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hoadons as $hd)
                <tr>
                    <td>{{ $hd->id }}</td>
                    <td><span class="badge bg-info">{{ $hd->ma_hoa_don }}</span></td>
                    <td>
                        {{-- Sửa: Thêm 'so_ban' cho an toàn --}}
                        <strong>{{ $hd->datBan->banAn->so_ban ?? 'N/A' }}</strong><br> 
                        <small>Khách: {{ $hd->datBan->ten_khach ?? 'N/A' }}</small>
                    </td>
                    
                    {{-- ========= SỬA LỖI Ở ĐÂY ========= --}}
                    {{-- 
                        Lỗi: $hd->tinhTongTien() không còn tồn tại.
                        Sửa: Dùng $hd->tong_tien (đã được lưu trong CSDL).
                    --}}
                    <td class="text-end">{{ number_format($hd->tong_tien ?? 0) }}₫</td>
                    
                    {{-- Tiền giảm --}}
                    <td class="text-end text-success">{{ number_format($hd->tien_giam ?? 0) }}₫</td>
                    
                    {{-- Phụ thu --}}
                    <td class="text-end text-warning">{{ number_format($hd->phu_thu ?? 0) }}₫</td>
                    
                    {{-- 
                        Đã thanh toán (Phần này ĐÚNG, không cần sửa)
                        Vì hàm tinhDaThanhToan() đã được sửa trong Model.
                    --}}
                    <td class="text-end">
                        @if($hd->da_thanh_toan >= $hd->tinhDaThanhToan())
                        <span class="badge bg-success">Đã thanh toán</span>
                        @else
                        <span class="badge bg-danger">Chưa đủ</span>
                        @endif
                        <br>
                        <small>{{ number_format($hd->tinhDaThanhToan()) }}₫</small>
                    </td>

                    {{-- Phương thức thanh toán --}}
                    <td>
                        {{-- Sửa: Chuyển sang dùng text đã lưu trong CSDL --}}
                        @if($hd->phuong_thuc_tt == 'tien_mat')
                            <span class="badge bg-primary" data-bs-toggle="tooltip" title="Thanh toán tiền mặt">Tiền mặt</span>
                        @elseif($hd->phuong_thuc_tt == 'chuyen_khoan')
                             <span class="badge bg-secondary" data-bs-toggle="tooltip" title="Thanh toán QR / Chuyển khoản">Chuyển khoản</span>
                        @else
                             <span class="badge bg-dark" data-bs-toggle="tooltip" title="{{ $hd->phuong_thuc_tt }}">{{ $hd->phuong_thuc_tt }}</span>
                        @endif
                    </td>

                    {{-- Ngày tạo --}}
                    <td>{{ $hd->created_at?->format('d/m/Y H:i') ?? 'N/A' }}</td>
                    
                    {{-- Hành động --}}
                    <td>
                        <a href="{{ route('admin.hoa-don.show', $hd->id) }}" class="btn btn-info btn-sm mb-1"
                            title="Xem chi tiết">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.hoa-don.edit', $hd->id) }}" class="btn btn-warning btn-sm mb-1"
                            title="Sửa hóa đơn">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.hoa-don.destroy', $hd->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm mb-1"
                                title="Xóa hóa đơn">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</main>

<script>
    // Khởi tạo tooltip của Bootstrap 5
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection