@extends('layouts.admins.layout-admin')

@section('title', 'Sửa danh mục')

@section('content')
<main class="app-content">

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="{{ route('admin.danh-muc.index') }}">Danh sách danh mục</a></li>
            <li class="breadcrumb-item active"><a href="#"><b>Sửa danh mục</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Sửa danh mục: {{ $danh_muc->ten_danh_muc }}</h3>
                
                <form action="{{ route('admin.danh-muc.update', $danh_muc->id) }}" method="POST">
                    @csrf
                    @method('PUT')
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

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="ten_danh_muc" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc"
                                        value="{{ old('ten_danh_muc', $danh_muc->ten_danh_muc) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Hiển thị <span class="text-danger">*</span></label>
                                    <div class="d-block mt-2"> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hien_thi" id="hien_thi_1" value="1" 
                                                {{ old('hien_thi', $danh_muc->hien_thi) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hien_thi_1">Hiển thị</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hien_thi" id="hien_thi_0" value="0"
                                                {{ old('hien_thi', $danh_muc->hien_thi) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hien_thi_0">Ẩn</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mo_ta" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4">{{ old('mo_ta', $danh_muc->mo_ta) }}</textarea>
                        </div>

                    </div>
                    
                    <div class="tile-footer">
                        <a href="{{ route('admin.danh-muc.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Hủy
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Cập nhật
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

{{-- 
  QUAN TRỌNG NHẤT:
  Đã xóa toàn bộ thẻ <style>...</style> thừa ở đây.
--}}
@endsection