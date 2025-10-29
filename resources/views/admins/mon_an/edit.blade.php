@extends('layouts.admins.layout-admin')

@section('title', 'Sửa món ăn')

@section('content')
<div class="app-content" style="padding-top:18px; min-height: calc(100vh - 120px);">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 p-3 rounded shadow-sm"
         style="background-color: rgba(236,238,240,1); color: #000;">
        <div>
            <h3 class="mb-0 fw-bold"><i class="bx bx-edit-alt"></i> Sửa món ăn</h3>
            <small class="opacity-75">Chỉnh sửa thông tin món ăn hiện có</small>
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

    {{-- Form sửa --}}
    <div class="card shadow-sm border-0">
        <div class="card-body bg-light">
            <form action="{{ route('admin.mon-an.update', $mon_an->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    {{-- Cột trái --}}
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên món <span class="text-danger">*</span></label>
                            <input type="text" class="form-control custom-input" name="ten_mon"
                                   value="{{ old('ten_mon', $mon_an->ten_mon) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                            <select name="danh_muc_id" class="form-select custom-input" required>
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($danhMucs as $dm)
                                    <option value="{{ $dm->id }}" {{ old('danh_muc_id', $mon_an->danh_muc_id) == $dm->id ? 'selected' : '' }}>
                                        {{ $dm->ten_danh_muc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" name="gia"
                                   value="{{ old('gia', $mon_an->gia) }}" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mô tả</label>
                            <textarea class="form-control custom-input" name="mo_ta" rows="3">{{ old('mo_ta', $mon_an->mo_ta) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Thời gian chế biến (phút) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" min="0" name="thoi_gian_che_bien"
                                   value="{{ old('thoi_gian_che_bien', $mon_an->thoi_gian_che_bien) }}" required>
                        </div>

                        {{-- Thêm dropdown LOẠI MÓN --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Loại món</label>
                            <select name="loai_mon" class="form-select custom-input">
                                <option value="">-- Chọn loại món --</option>
                                @foreach(['Khai vị','Món chính','Tráng miệng','Đồ uống'] as $loai)
                                    <option value="{{ $loai }}" {{ old('loai_mon', $mon_an->loai_mon) == $loai ? 'selected' : '' }}>
                                        {{ $loai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Chỉnh lại dropdown TRẠNG THÁI --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Trạng thái</label>
                            <select name="trang_thai" class="form-select custom-input" required>
                                <option value="con" {{ old('trang_thai', $mon_an->trang_thai) == 'con' ? 'selected' : '' }}>Còn món</option>
                                <option value="het" {{ old('trang_thai', $mon_an->trang_thai) == 'het' ? 'selected' : '' }}>Hết món</option>
                                <option value="an" {{ old('trang_thai', $mon_an->trang_thai) == 'an' ? 'selected' : '' }}>Ẩn khỏi menu</option>
                            </select>
                        </div>
                    </div>

                    {{-- Cột phải --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Ảnh món ăn</label>
                        <input type="file" name="hinh_anh" class="form-control custom-input" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-3 text-center">
                            <div class="border rounded-3 bg-white p-2 shadow-sm d-inline-block">
                                @if($mon_an->hinh_anh)
                                    <img id="preview" src="{{ asset($mon_an->hinh_anh) }}" class="img-fluid rounded-3"
                                         style="max-height: 200px; object-fit: cover;">
                                @else
                                    <img id="preview" src="#" class="img-fluid rounded-3 d-none"
                                         style="max-height: 200px; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Nút hành động --}}
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bx bx-save me-1"></i> Cập nhật
                    </button>
                    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bx bx-x-circle me-1"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script preview ảnh --}}
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
