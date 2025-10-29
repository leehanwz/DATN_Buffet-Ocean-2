@extends('layouts.admins.layout-admin')

@section('title', 'Thêm danh mục')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Thêm danh mục món</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.danhmucmons.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" value="{{ old('ten_danh_muc') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="mo_ta" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3">{{ old('mo_ta') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="hien_thi" class="form-label">Hiển thị</label>
                            <select name="hien_thi" id="hien_thi" class="form-select" required>
                                <option value="1" {{ old('hien_thi') == 1 ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ old('hien_thi') == 0 ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                        <a href="{{ route('admin.danhmucmons.index') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection