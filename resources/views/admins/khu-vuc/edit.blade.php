@extends('layouts.admins.layout-admin')

@section('title', 'Chỉnh sửa khu vực')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Khu vực</li>
            <li class="breadcrumb-item"><a href="#">Chỉnh sửa khu vực</a></li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Chỉnh sửa khu vực</h3>
        <div class="tile-body">
            <form action="{{ route('admin.khu-vuc.update', $khuVuc->id) }}" method="POST" class="row">
                @csrf
                @method('PUT')

                <div class="form-group col-md-6">
                    <label>Tên khu vực <span class="text-danger">*</span></label>
                    <input type="text" name="ten_khu_vuc" class="form-control"
                        value="{{ old('ten_khu_vuc', $khuVuc->ten_khu_vuc) }}">
                    @error('ten_khu_vuc') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-3">
                    <label>Tầng</label>
                    <input type="text" name="tang" class="form-control" value="{{ old('tang', $khuVuc->tang) }}">
                </div>

                <div class="form-group col-md-3">
                    <label>Trạng thái</label>
                    <select name="trang_thai" class="form-control">
                        <option value="1" {{ $khuVuc->trang_thai == 1 ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ $khuVuc->trang_thai == 0 ? 'selected' : '' }}>Tạm ngưng</option>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label>Mô tả</label>
                    <textarea name="mo_ta" class="form-control" rows="3">{{ old('mo_ta', $khuVuc->mo_ta) }}</textarea>
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-save"><i class="fas fa-save"></i> Cập nhật</button>
                    <a href="{{ route('admin.khu-vuc.index') }}" class="btn btn-cancel">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection