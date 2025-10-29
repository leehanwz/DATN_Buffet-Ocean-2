@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món ăn')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <div>
                <h3 class="mb-0 fw-bold"><i class='bx bx-food-menu'></i> Danh sách món ăn</h3>
                <small class="opacity-75">Quản lý tất cả các món ăn hiện có trong hệ thống</small>
            </div>
        </ul>
        <a href="{{ route('admin.mon-an.create') }}" class="btn btn-light fw-semibold shadow-sm">
            <i class='bx bx-plus me-1'></i> Thêm món ăn
        </a>
    </div>

    {{-- Flash --}}
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

    {{-- Nội dung chính --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center table-navy mb-0">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%" class="text-start">Tên món</th>
                            <th style="width: 15%">Danh mục</th>
                            <th style="width: 12%">Loại món</th>
                            <th style="width: 10%">Giá</th>
                            <th style="width: 12%">Ảnh</th>
                            <th style="width: 10%">Thời gian</th>
                            <th style="width: 8%">Trạng thái</th>
                            <th style="width: 20%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dsMonAn as $index => $monAn)
                        <tr>
                            <td class="fw-semibold">{{ $index + 1 }}</td>

                            <td class="fw-medium text-start">
                                <div class="d-flex flex-column">
                                    <span>{{ $monAn->ten_mon }}</span>
                                    @if($monAn->mo_ta)
                                    <small class="text-muted fst-italic">{{ Str::limit($monAn->mo_ta, 60) }}</small>
                                    @endif
                                </div>
                            </td>

                            <td>
                                @php
                                $mauDanhMuc = match(strtolower($monAn->danhMuc->ten_danh_muc ?? '')) {
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
                            <td>
                                @if($monAn->loai_mon)
                                <span class="badge bg-light text-navy fw-semibold border">
                                    {{ $monAn->loai_mon }}
                                </span>
                                @else
                                <span class="text-muted fst-italic">Không phân loại</span>
                                @endif
                            </td>
                            <td class="text-danger fw-semibold">
                                {{ number_format($monAn->gia,0,',','.') }}₫
                            </td>

                            <td>
                                @if($monAn->hinh_anh)
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset($monAn->hinh_anh) }}" width="65" height="65"
                                        class="rounded-circle border shadow-sm object-fit-cover" alt="Ảnh món">
                                </div>
                                @else
                                <span class="text-muted fst-italic">Không có ảnh</span>
                                @endif
                            </td>

                            <td>{{ $monAn->thoi_gian_che_bien }} phút</td>

                            <td>
                                @php
                                $labelTrangThai = [
                                'con' => ['Còn món', 'badge-status-active'],
                                'het' => ['Hết món', 'badge-status-warning'],
                                'an' => ['Ẩn', 'badge-status-inactive'],
                                ];
                                $status = $labelTrangThai[$monAn->trang_thai] ?? ['Không rõ', 'badge-status-inactive'];
                                @endphp
                                <span class="badge {{ $status[1] }}">{{ $status[0] }}</span>
                            </td>
                            <td>
                                <div class="btn-group d-flex justify-content-center" role="group">
                                    <a href="{{ route('admin.mon-an.show', $monAn->id) }}"
                                        class="btn btn-sm btn-outline-info me-1" data-bs-toggle="tooltip" title="Xem chi tiết">
                                        <i class='bx bx-show'></i>
                                    </a>
                                    <a href="{{ route('admin.mon-an.edit', $monAn->id) }}"
                                        class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="tooltip" title="Sửa món ăn">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                    <form action="{{ route('admin.mon-an.destroy', $monAn->id) }}" method="POST"
                                        onsubmit="return confirm('Xác nhận xóa món ăn này?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Xóa món ăn">
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
            </div>

            {{-- pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $dsMonAn->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

{{-- CSS nhỏ để tránh cắt layout và đảm bảo responsive --}}
<style>
    .app-content {
        box-sizing: border-box;
    }
.badge.bg-light.text-navy {
    background-color: #3376baff !important;
    color: #eff2f5ff !important;
    border: 1px solid #cfd8dc !important;
}
    .badge.bg-primary-subtle {
        background-color: #e8f0fe !important;
        color: #0d47a1 !important;
        border: 1px solid #bbdefb;
    }

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
        transition: all 0.12s ease;
    }

    img.object-fit-cover {
        object-fit: cover;
    }
.badge-status-active {
    background-color: #d4edda !important;
    color: #155724 !important;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 0.5rem;
    border: 1px solid #c3e6cb;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}

.badge-status-warning {
    background-color: #fff3cd !important;
    color: #856404 !important;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 0.5rem;
    border: 1px solid #ffeeba;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}

.badge-status-inactive {
    background-color: #e2e3e5 !important;
    color: #383d41 !important;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 0.5rem;
    border: 1px solid #d6d8db;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}

    .btn {
        border-radius: 0.5rem;
    }

    .fw-medium {
        font-weight: 500;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    td img {
        max-width: 65px;
        max-height: 65px;
    }

    .card {
        border-radius: 0.8rem;
    }
</style>

@endsection
