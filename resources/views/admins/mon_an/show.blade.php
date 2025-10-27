@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết món ăn')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 700px;">
        <!-- Header -->
        <div class="card-header text-white py-3 px-4 rounded-top-4 d-flex justify-content-between align-items-center"
             style="background-color: #002b5b;">
            <h3 class="mb-0 fw-bold"><i class='bx bx-restaurant me-2'></i>Chi tiết món ăn</h3>
            <a href="{{ route('admin.mon-an.index') }}" class="btn btn-light btn-sm fw-semibold shadow-sm">
                <i class='bx bx-arrow-back'></i> Quay lại
            </a>
        </div>

        <!-- Body -->
        <div class="card-body bg-light p-4">
            <!-- Ảnh món ăn -->
            <div class="text-center mb-4">
                @if($mon_an->hinh_anh)
                    <img src="{{ asset($mon_an->hinh_anh) }}" alt="Hình ảnh món ăn"
                         class="img-fluid rounded-4 shadow-sm border"
                         style="max-height: 280px; object-fit: cover;">
                @else
                    <div class="p-4 text-muted fst-italic border rounded-4 bg-white">
                        Không có hình ảnh
                    </div>
                @endif
            </div>

            <!-- Thông tin món ăn -->
            <div class="mb-3">
                <h4 class="fw-bold text-navy mb-3">{{ $mon_an->ten_mon }}</h4>

                <p class="mb-2">
                    <i class='bx bx-purchase-tag me-1 text-secondary'></i>
                    <strong>Giá:</strong>
                    <span class="text-danger fw-semibold">{{ number_format($mon_an->gia, 0, ',', '.') }}₫</span>
                </p>

                <p class="mb-2">
                    <i class='bx bx-category me-1 text-secondary'></i>
                    <strong>Danh mục:</strong>
                    @php
                        $mauDanhMuc = match($mon_an->danhMuc->ten_danh_muc ?? '') {
                            'món chính' => 'bg-danger-subtle text-danger',
                            'món khai vị' => 'bg-info-subtle text-info',
                            'món tráng miệng' => 'bg-warning-subtle text-warning',
                            'món chay' => 'bg-success-subtle text-success',
                            default => 'bg-secondary text-white'
                        };
                    @endphp
                    <span class="badge px-3 py-2 fw-semibold {{ $mauDanhMuc }}">
                        {{ $mon_an->danhMuc->ten_danh_muc ?? 'Không xác định' }}
                    </span>
                </p>

                <p class="mb-2">
                    <i class='bx bx-time me-1 text-secondary'></i>
                    <strong>Thời gian chế biến:</strong>
                    {{ $mon_an->thoi_gian_che_bien }} phút
                </p>

                <p class="mb-2">
                    <i class='bx bx-bowl-hot me-1 text-secondary'></i>
                    <strong>Loại món:</strong>
                    {{ $mon_an->loai_mon ?? 'Không có' }}
                </p>

                <p class="mb-2">
                    <i class='bx bx-show-alt me-1 text-secondary'></i>
                    <strong>Trạng thái:</strong>
                    <span class="badge px-3 py-2 {{ $mon_an->trang_thai ? 'bg-success' : 'bg-secondary' }}">
                        {{ $mon_an->trang_thai ? 'Hiển thị' : 'Ẩn' }}
                    </span>
                </p>
            </div>

            <hr>

            <!-- Mô tả -->
            <div class="mt-3">
                <h5 class="fw-bold mb-2 text-navy">
                    <i class='bx bx-detail me-1 text-secondary'></i>Mô tả món ăn
                </h5>
                <div class="bg-white border rounded-3 p-3 shadow-sm" style="min-height: 100px;">
                    {!! nl2br(e($mon_an->mo_ta ?? 'Không có mô tả')) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS tùy chỉnh -->
<style>
    .text-navy {
        color: #002b5b;
    }

    .card {
        border-radius: 1rem;
    }

    .badge {
        font-size: 0.9rem;
    }

    .btn {
        border-radius: 0.5rem;
    }

    .bg-light {
        background-color: #f8fafc !important;
    }

    .border {
        border-color: #dee2e6 !important;
    }
</style>
@endsection
