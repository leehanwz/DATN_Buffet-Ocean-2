@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết món ăn')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Chi tiết món ăn</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    {{-- Tiêu đề căn giữa --}}
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary mb-1">
                            <i class='bx bx-restaurant me-2'></i>{{ $mon_an->ten_mon }}
                        </h2>
                        <div class="text-muted fst-italic">Chi tiết thông tin món ăn</div>
                    </div>

                    <div class="row">
                        {{-- Cột trái: hình ảnh --}}
                        <div class="col-md-5 text-center">
                            <h6 class="fw-bold mb-3">Hình ảnh món ăn</h6>
                            @if($mon_an->hinh_anh)
                                <img src="{{ asset($mon_an->hinh_anh) }}" alt="Hình ảnh món ăn"
                                    class="img-thumbnail rounded shadow-sm" style="max-height: 280px; object-fit: cover;">
                            @else
                                <div class="p-4 text-muted fst-italic border rounded bg-white">
                                    Không có hình ảnh
                                </div>
                            @endif
                        </div>

                        {{-- Cột phải: thông tin món --}}
                        <div class="col-md-7">
                            <p class="mb-2">
                                <i class='bx bx-purchase-tag me-1 text-secondary'></i>
                                <strong>Giá:</strong>
                                <span class="text-danger fw-semibold">{{ number_format($mon_an->gia, 0, ',', '.') }}₫</span>
                            </p>

                            <p class="mb-2">
                                <i class='bx bx-category me-1 text-secondary'></i>
                                <strong>Danh mục:</strong>
                                <span class="text-dark">{{ $mon_an->danhMuc->ten_danh_muc ?? 'Không xác định' }}</span>
                            </p>

                            <p class="mb-2">
                                <i class='bx bx-time me-1 text-secondary'></i>
                                <strong>Thời gian chế biến:</strong> {{ $mon_an->thoi_gian_che_bien }} phút
                            </p>

                            <p class="mb-2">
                                <i class='bx bx-bowl-hot me-1 text-secondary'></i>
                                <strong>Loại món:</strong>
                                <span class="text-dark">{{ $mon_an->loai_mon ?? 'Không phân loại' }}</span>
                            </p>

                            <p class="mb-2">
                                <i class='bx bx-show-alt me-1 text-secondary'></i>
                                <strong>Trạng thái:</strong>
                                <span class="text-dark">
                                    @if($mon_an->trang_thai == 'con')
                                        Còn món
                                    @elseif($mon_an->trang_thai == 'het')
                                        Hết món
                                    @else
                                        Ẩn
                                    @endif
                                </span>
                            </p>

                            <hr>

                            <h5 class="fw-bold mb-2"><i class='bx bx-detail me-1 text-secondary'></i>Mô tả món ăn</h5>
                            <div class="bg-light border rounded p-3" style="min-height: 100px;">
                                {!! nl2br(e($mon_an->mo_ta ?? 'Không có mô tả')) !!}
                            </div>
                        </div>
                    </div>

                </div> {{-- tile-body --}}
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-secondary btn-sm px-4">
                        <i class='bx bx-arrow-back'></i> Quay lại
                    </a>
                </div>
            </div> {{-- tile --}}
        </div>
    </div>
</div>

<style>
    .tile-body {
        background-color: #f8fafc;
        border-radius: 8px;
    }

    .btn {
        border-radius: 6px;
    }

    h2.text-primary {
        color: #275583 !important;
    }
</style>
@endsection
