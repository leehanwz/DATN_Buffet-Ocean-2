@extends('layouts.admins.layout-admin')

@section('title', 'Sửa danh mục')

@section('content')
<div class="container-fluid mt-4">
    <h3>Sửa danh mục</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.danh-muc.update', $danh_muc->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" value="{{ old('ten_danh_muc', $danh_muc->ten_danh_muc) }}" required>
        </div>

        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mo_ta" name="mo_ta">{{ old('mo_ta', $danh_muc->mo_ta) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="hien_thi" class="form-label">Hiển thị</label>
            <select name="hien_thi" id="hien_thi" class="form-select" required>
                <option value="1" {{ old('hien_thi', $danh_muc->hien_thi) == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ old('hien_thi', $danh_muc->hien_thi) == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    </form>
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
