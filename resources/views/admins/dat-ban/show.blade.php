@extends('layouts.admins.layout-admin')

@section('title', 'Chi Tiết Đặt Bàn')

@section('style')
<style>
    .info-box {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        margin-bottom: 15px; /* Thêm khoảng cách */
    }
    .info-box h5 {
        font-weight: bold;
        color: #009688;
        margin-bottom: 15px;
    }
    .info-box p {
        margin-bottom: 10px;
        font-size: 1.1em;
    }
    .info-box p strong {
        min-width: 150px;
        display: inline-block;
        color: #333;
    }
    .status-update-form {
        background-color: #f0f8ff; /* Màu nền nhẹ */
        border: 1px solid #bce8f1;
        border-radius: 5px;
        padding: 20px;
    }
</style>
@endsection

@section('content')
    <main class="app-content">
        
        {{-- Tiêu đề trang --}}
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dat-ban.index') }}">Quản lý Đặt Bàn</a></li>
                <li class="breadcrumb-item"><a href="#"><b>Chi Tiết Đặt Bàn ({{ $datBan->ma_dat_ban }})</b></a></li>
            </ul>
        </div>

        {{-- Thông báo --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        
                        {{-- Nút quay lại và Sửa --}}
                        <a href="{{ route('admin.dat-ban.index') }}" class="btn btn-secondary mb-3">
                            <i class="fas fa-chevron-left"></i> Quay lại Danh sách
                        </a>
                        @if (!in_array($datBan->trang_thai, ['hoan_tat', 'huy']))
                            <a href="{{ route('admin.dat-ban.edit', $datBan->id) }}" class="btn btn-info mb-3">
                                <i class="fas fa-edit"></i> Sửa Thông Tin Đơn
                            </a>
                        @endif

                        <hr>

                        <div class="row">
                            {{-- Cột Thông Tin Khách Hàng --}}
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h5><i class="fas fa-user mr-2"></i> Thông Tin Khách Hàng</h5>
                                    <p><strong>Tên Khách Hàng:</strong> {{ $datBan->ten_khach }}</p>
                                    <p><strong>Số Điện Thoại:</strong> {{ $datBan->sdt_khach }}</p>
                                    <p><strong>Số Lượng Khách:</strong> {{ $datBan->so_khach }} người</p>
                                </div>
                            </div>

                            {{-- Cột Thông Tin Đặt Bàn --}}
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h5><i class="fas fa-calendar-check mr-2"></i> Thông Tin Đặt Bàn</h5>
                                    <p><strong>Mã Đặt Bàn:</strong> {{ $datBan->ma_dat_ban }}</p>
                                    <p><strong>Giờ Đến:</strong> {{ $datBan->gio_den ? \Carbon\Carbon::parse($datBan->gio_den)->format('H:i \n\g\à\y d/m/Y') : 'N/A' }}</p>
                                    
                                    {{-- 💡 ĐÃ THÊM: HIỂN THỊ TIỀN CỌC --}}
                                    <p><strong>Tiền Cọc:</strong> {{ number_format($datBan->tien_coc ?? 0) }} đ</p>
                                    
                                    <p><strong>Trạng Thái Hiện Tại:</strong> 
                                        @if($datBan->trang_thai == 'cho_xac_nhan')
                                            <span class="badge bg-info">Chờ xác nhận</span>
                                        @elseif($datBan->trang_thai == 'da_xac_nhan')
                                            <span class="badge bg-primary">Đã xác nhận</span>
                                        @elseif($datBan->trang_thai == 'khach_da_den')
                                            <span class="badge bg-success">Khách đã đến</span>
                                        @elseif($datBan->trang_thai == 'hoan_tat')
                                            <span class="badge bg-secondary">Hoàn tất</span>
                                        @elseif($datBan->trang_thai == 'huy')
                                            <span class="badge bg-danger">Đã hủy</span>
                                        @else
                                            <span class="badge bg-light text-dark">{{ $datBan->trang_thai }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            {{-- Cột Thông Tin Bàn & Combo --}}
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h5><i class="fas fa-chair mr-2"></i> Bàn & Combo</h5>
                                    <p><strong>Bàn Đã Chọn:</strong> {{ $datBan->banAn->so_ban ?? 'N/A' }}</p>
                                    <p><strong>Combo:</strong> {!! $datBan->comboBuffet->ten_combo ?? '<em>Không chọn combo</em>' !!}</p>
                                </div>
                            </div>
                            
                            {{-- Cột Ghi Chú & Nhân viên --}}
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h5><i class="fas fa-file-alt mr-2"></i> Thông Tin Khác</h5>
                                    <p><strong>Nhân viên xử lý:</strong> {{ $datBan->nhanVien->ho_ten ?? 'N/A' }}</p>
                                    <p><strong>Loại Đặt:</strong> {{ $datBan->la_dat_online ? 'Online' : 'Tại quầy' }}</p>
                                    <p><strong>Ghi Chú:</strong> {{ $datBan->ghi_chu ?? 'Không có ghi chú' }}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Form Cập nhật trạng thái --}}
                        @if (!in_array($datBan->trang_thai, ['hoan_tat', 'huy']))
                        <div class="row">
                            <div class="col-md-12">
                                <form class="row status-update-form" method="POST" action="{{ route('admin.dat-ban.updateStatus', $datBan->id) }}">
                                    @csrf
                                    <div class="col-md-8">
                                        <h5>Cập nhật trạng thái đơn</h5>
                                        <select class="form-control" name="trang_thai_moi" required>
                                            <option value="cho_xac_nhan" {{ $datBan->trang_thai == 'cho_xac_nhan' ? 'selected' : '' }}>Chờ xác nhận</option>
                                            <option value="da_xac_nhan" {{ $datBan->trang_thai == 'da_xac_nhan' ? 'selected' : '' }}>Đã xác nhận (Khách chưa đến)</option>
                                            <option value="khach_da_den" {{ $datBan->trang_thai == 'khach_da_den' ? 'selected' : '' }}>Khách đã đến (Check-in)</option>
                                            <option value="hoan_tat" {{ $datBan->trang_thai == 'hoan_tat' ? 'selected' : '' }}>Hoàn tất (Đã thanh toán)</option>
                                            <option value="huy" {{ $datBan->trang_thai == 'huy' ? 'selected' : '' }}>Hủy đơn</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-check"></i> Cập Nhật Trạng Thái
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-info">
                            Đơn đặt bàn này đã Hoàn tất hoặc Bị hủy, không thể thay đổi trạng thái.
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection