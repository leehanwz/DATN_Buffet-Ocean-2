@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết món ăn')

@section('content')
<main class="app-content">

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="{{ route('admin.san-pham.index') }}">Danh sách món ăn</a></li>
            <li class="breadcrumb-item active"><a href="#"><b>Chi tiết món ăn</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">Chi tiết: {{ $mon_an->ten_mon }}</h3>
                    <a href="{{ route('admin.san-pham.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Quay lại
                    </a>
                </div>
                
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-4">
                            {{-- HIỂN THỊ ẢNH CHÍNH --}}
                            <h5 class="fw-bold text-center mb-3">Ảnh Đại Diện</h5>
                            @if($mon_an->hinh_anh)
                            <img src="{{ asset($mon_an->hinh_anh) }}" alt="Hình ảnh món ăn"
                                class="img-fluid rounded border shadow-sm mb-4" style="object-fit: cover; height: 300px; width: 100%;">
                            @else
                            <div class="d-flex align-items-center justify-content-center border rounded bg-light mb-4" style="height: 300px; width: 100%;">
                                <span class="text-muted fst-italic">Không có hình ảnh</span>
                            </div>
                            @endif

                            {{-- HIỂN THỊ THƯ VIỆN ẢNH --}}
                            <h5 class="fw-bold mt-2">Thư viện ảnh</h5>
                            <div class="d-flex flex-wrap gap-2 border p-2 rounded" style="min-height: 80px;">
                                {{-- $mon_an->thuVienAnh đã được load trong Controller --}}
                                @forelse ($mon_an->thuVienAnh as $anh)
                                    <img src="{{ asset($anh->duong_dan_anh) }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;" 
                                         class="img-thumbnail">
                                @empty
                                    <span class="text-muted small">Món ăn này chưa có ảnh phụ.</span>
                                @endforelse
                            </div>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Giá bán</th>
                                        <td class="text-danger fw-bold fs-5">{{ number_format($mon_an->gia, 0, ',', '.') }} đ</td>
                                    </tr>
                                    <tr>
                                        <th>Danh mục</th>
                                        <td>
                                            <span class="badge {{ $mon_an->danh_muc_badge }}">
                                                {{ $mon_an->danhMuc->ten_danh_muc ?? 'Không xác định' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Loại món</th>
                                        <td>{{ $mon_an->loai_mon ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Thời gian chế biến</th>
                                        <td>{{ $mon_an->thoi_gian_che_bien }} phút</td>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>
                                            <span class="badge {{ $mon_an->trang_thai_badge }}">
                                                {{ $mon_an->trang_thai_display }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ngày tạo</th>
                                        <td>{{ $mon_an->created_at ? $mon_an->created_at->format('d/m/Y H:i') : '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cập nhật lần cuối</th>
                                        <td>{{ $mon_an->updated_at ? $mon_an->updated_at->format('d/m/Y H:i') : '—' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h5 class="fw-bold">
                                <i class="fas fa-info-circle me-2"></i>Mô tả món ăn
                            </h5>
                            <div class="border rounded bg-light p-3" style="min-height: 100px;">
                                {!! nl2br(e($mon_an->mo_ta ?? 'Không có mô tả.')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection