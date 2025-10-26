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
@endsection
