@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách khu vực')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý khu vực</li>
            <li class="breadcrumb-item"><a href="#">Danh sách khu vực</a></li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Danh sách khu vực</h3>

        <div class="row mb-3">
            <div class="col-md-6">
                <form method="GET" action="{{ route('admin.khu-vuc.index') }}" class="form-inline">
                    <input type="text" name="keyword" class="form-control mr-2" placeholder="Tìm theo tên..."
                        value="{{ request('keyword') }}">
                    <select name="trang_thai" class="form-control mr-2">
                        <option value="">-- Trạng thái --</option>
                        <option value="1" {{ request('trang_thai') == '1' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ request('trang_thai') == '0' ? 'selected' : '' }}>Tạm ngưng</option>
                    </select>
                    <button class="btn btn-primary"><i class="fas fa-search"></i> Lọc</button>
                </form>
            </div>

            <div class="col-md-6 text-right">
                <a href="{{ route('admin.khu-vuc.create') }}" class="btn btn-add btn-sm">
                    <i class="fas fa-plus"></i> Thêm khu vực
                </a>
            </div>
        </div>

        <div class="tile-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Tên khu vực</th>
                        <th>Tầng</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th width="20%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($khuVucs as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->ten_khu_vuc }}</td>
                        <td>{{ $item->tang ?? '—' }}</td>
                        <td>{{ $item->mo_ta ?? '—' }}</td>
                        <td>
                            @if ($item->trang_thai)
                            <span class="badge bg-success">Hoạt động</span>
                            @else
                            <span class="badge bg-secondary">Tạm ngưng</span>
                            @endif
                        </td>
                        <td>
                            {{-- Nút chỉnh sửa --}}
                            <a href="{{ route('admin.khu-vuc.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- Nút xóa --}}
                            <form action="{{ route('admin.khu-vuc.destroy', $item->id) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('Bạn chắc chắn muốn xóa khu vực này?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>

                            {{-- Form ẩn cập nhật trạng thái --}}
                            <form id="formTrangThai{{ $item->id }}"
                                action="{{ route('admin.khu-vuc.cap-nhat-trang-thai', $item->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('PATCH')
                            </form>

                            {{-- Nút đổi trạng thái --}}
                            <button onclick="document.getElementById('formTrangThai{{ $item->id }}').submit()"
                                class="btn btn-sm {{ $item->trang_thai ? 'btn-info' : 'btn-secondary' }}">
                                <i class="fas fa-sync"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Chưa có khu vực nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection