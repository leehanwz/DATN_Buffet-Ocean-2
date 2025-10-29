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
{{-- Thêm CSS fix layout --}}
    <style>
        body {
            background-color: #f8f9fa;
        }

        .app-sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #002b5b;
            color: white;
            overflow-y: auto;
        }

        main {
            margin-left: 250px; /* chừa chỗ cho sidebar */
            min-height: 100vh;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .app-header {
            margin-left: 250px;
            background-color: #002b5b;
            color: white;
            padding: 10px 20px;
        }

        .app-sidebar__user-avatar {
            border-radius: 50%;
            object-fit: cover;
        }

        .app-menu__item {
            color: white;
            transition: background 0.3s ease;
        }

        .app-menu__item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .app-menu__label {
            font-weight: 500;
        }

        .app-sidebar__user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
        }

        .app-sidebar__user-name {
            margin: 0;
            font-size: 1rem;
        }

        .app-sidebar__user-designation {
            margin: 0;
            font-size: 0.8rem;
            opacity: 0.8;
        }
    </style>
@endsection
