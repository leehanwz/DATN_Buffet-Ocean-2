@extends('layouts.admins.layout-admin')

@section('title', 'Thêm món ăn')

@section('content')
<div class="app-content" style="padding-top:18px; min-height: calc(100vh - 120px);">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 p-3 rounded shadow-sm"
         style="background-color: rgba(236,238,240,1); color: #000;">
        <div>
            <h3 class="mb-0 fw-bold"><i class="bx bx-plus-circle"></i> Thêm món ăn</h3>
            <small class="opacity-75">Tạo mới một món ăn trong hệ thống</small>
        </div>
        <a href="{{ route('admin.mon-an.index') }}" class="btn btn-light fw-semibold shadow-sm">
            <i class="bx bx-arrow-back me-1"></i> Quay lại danh sách
        </a>
    </div>

    {{-- Hiển thị lỗi --}}
    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form thêm --}}
    <div class="card shadow-sm border-0">
        <div class="card-body bg-light">
            <form action="{{ route('admin.mon-an.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- Cột trái --}}
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên món <span class="text-danger">*</span></label>
                            <input type="text" class="form-control custom-input" name="ten_mon" value="{{ old('ten_mon') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                            <select name="danh_muc_id" class="form-select custom-input" required>
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($danhMucs as $dm)
                                    <option value="{{ $dm->id }}">{{ $dm->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" name="gia" min="0" value="{{ old('gia') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mô tả</label>
                            <textarea class="form-control custom-input" name="mo_ta" rows="3">{{ old('mo_ta') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Thời gian chế biến (phút) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" min="1" name="thoi_gian_che_bien" value="{{ old('thoi_gian_che_bien') }}" required>
                        </div>

                        {{-- Sửa theo enum --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                            <select name="trang_thai" class="form-select custom-input" required>
                                <option value="con">Còn món</option>
                                <option value="het">Hết món</option>
                                <option value="an">Ẩn khỏi menu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Loại món</label>
                            <select name="loai_mon" class="form-select custom-input">
                                <option value="">-- Chọn loại món --</option>
                                <option value="Khai vị">Khai vị</option>
                                <option value="Món chính">Món chính</option>
                                <option value="Tráng miệng">Tráng miệng</option>
                                <option value="Đồ uống">Đồ uống</option>
                            </select>
                        </div>
                    </div>

                    {{-- Cột phải --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Ảnh món ăn</label>
                        <input type="file" name="hinh_anh" class="form-control custom-input" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-3 text-center">
                            <div class="border rounded-3 bg-white p-2 shadow-sm d-inline-block">
                                <img id="preview" src="#" class="img-fluid rounded-3 d-none" style="max-height: 200px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Nút --}}
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bx bx-check-circle me-1"></i> Thêm món
                    </button>
                    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bx bx-x-circle me-1"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Preview ảnh --}}
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('d-none');
}
</script>

<style>
    .custom-input {
        border-radius: 10px;
        border: 1px solid #275583;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
        transition: all 0.2s ease;
    }

    .custom-input:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13,110,253,0.15);
    }

    .card {
        border-radius: 0.8rem;
    }
</style>
@endsection
