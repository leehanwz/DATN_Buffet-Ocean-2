@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món ăn')

@section('content')
<div class="container-fluid px-4 mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4 p-3 rounded shadow-sm"
        style="background-color: #002b5b; color: #fff;">
        <div>
            <h3 class="mb-0 fw-bold"><i class='bx bx-food-menu'></i> Danh sách món ăn</h3>
            <small class="opacity-75">Quản lý tất cả các món ăn hiện có trong hệ thống</small>
        </div>
        <a href="{{ route('admin.mon-an.create') }}" class="btn btn-light fw-semibold shadow-sm">
            <i class='bx bx-plus me-1'></i> Thêm món ăn
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success text-center fw-semibold rounded-3 shadow-sm" id="flashMsg">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            const msg = document.getElementById('flashMsg');
            if (msg) msg.remove();
        }, 3000);
    </script>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <table class="table table-hover align-middle text-center table-navy mb-0">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Tên món</th>
                        <th style="width: 15%">Danh mục</th>
                        <th style="width: 10%">Giá</th>
                        <th style="width: 15%">Ảnh</th>
                        <th style="width: 15%">Thời gian</th>
                        <th style="width: 10%">Trạng thái</th>
                        <th style="width: 15%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dsMonAn as $index => $monAn)
                    <tr>
                        <td class="fw-semibold">{{ $index + 1 }}</td>
                        <td class="fw-medium text-start">{{ $monAn->ten_mon }}</td>

                        <td>
                            @php
                            $mauDanhMuc = match($monAn->danhMuc->ten_danh_muc ?? '') {
                            'món chính' => 'bg-danger-subtle text-danger',
                            'món khai vị' => 'bg-info-subtle text-info',
                            'món tráng miệng' => 'bg-warning-subtle text-warning',
                            'món chay' => 'bg-success-subtle text-success',
                            default => 'bg-secondary text-white'
                            };
                            @endphp
                            <span class="badge px-3 py-2 fw-semibold {{ $mauDanhMuc }}">
                                {{ $monAn->danhMuc->ten_danh_muc ?? '-' }}
                            </span>
                        </td>

                        <td class="text-danger fw-semibold">
                            {{ number_format($monAn->gia,0,',','.') }}₫
                        </td>

                        <td>
                            @if($monAn->hinh_anh)
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset($monAn->hinh_anh) }}" width="65" height="65"
                                    class="rounded-circle border shadow-sm object-fit-cover">
                            </div>
                            @else
                            <span class="text-muted fst-italic">Không có ảnh</span>
                            @endif
                        </td>

                        <td>{{ $monAn->thoi_gian_che_bien }} phút</td>

                        <td>
                            <span class="badge {{ $monAn->trang_thai ? 'bg-success' : 'bg-secondary' }}">
                                {{ $monAn->trang_thai ? 'Hiển thị' : 'Ẩn' }}
                            </span>
                        </td>

                        <td>
                            <div class="btn-group d-flex justify-content-center" role="group">
                                <a href="{{ route('admin.mon-an.show', $monAn->id) }}"
                                    class="btn btn-sm btn-outline-info me-1" data-bs-toggle="tooltip"
                                    title="Xem chi tiết">
                                    <i class='bx bx-show'></i>
                                </a>
                                <a href="{{ route('admin.mon-an.edit', $monAn->id) }}"
                                    class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="tooltip"
                                    title="Sửa món ăn">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <form action="{{ route('admin.mon-an.destroy', $monAn->id) }}" method="POST"
                                    onsubmit="return confirm('Xác nhận xóa món ăn này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                        title="Xóa món ăn">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Chưa có món ăn nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $dsMonAn->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<style>
    .table-navy thead {
        background-color: #002b5b;
        color: #fff;
    }

    .table td,
    .table th {
        vertical-align: middle !important;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f6ff !important;
        transition: all 0.2s ease;
    }

    img.object-fit-cover {
        object-fit: cover;
    }

    .badge.bg-success,
    .badge.bg-secondary {
        color: #fff !important;
        font-weight: 600;
        padding: 6px 12px;
        font-size: 0.85rem;
        border-radius: 0.5rem;
    }

    .btn {
        border-radius: 0.5rem;
    }

    .card {
        border-radius: 1rem;
    }

    .fw-medium {
        font-weight: 500;
    }

    .badge.bg-success {
        background-color: #28a745 !important;
        /* xanh đậm hơn */
        color: #fff !important;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);
        font-weight: 600;
    }

    .badge.bg-secondary {
        background-color: #6c757d !important;
        /* xám đậm */
        color: #fff !important;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        font-weight: 600;
    }
</style>
@endsection
