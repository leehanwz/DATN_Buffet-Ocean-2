@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Danh sách danh mục</h3>
        <a href="{{ route('admin.danh-muc.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Thêm danh mục
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($danhMucs as $index => $dm)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dm->ten_danh_muc }}</td>
                            <td>{{ $dm->mo_ta ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $dm->hien_thi ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $dm->hien_thi ? 'Hiển thị' : 'Ẩn' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.danh-muc.edit', $dm->id) }}" class="btn btn-sm btn-warning">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <form action="{{ route('admin.danh-muc.destroy', $dm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa danh mục này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Chưa có danh mục nào</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $danhMucs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
