@extends('layouts.admins.layout-admin')

@section('title', 'Thêm món ăn')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active">
                <a href="#"><b>Thêm món ăn</b></a>
            </li>
        </ul>
        <div id="clock"></div>
    </div>

    {{-- Hiển thị lỗi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title fw-bold text-uppercase mb-3">
                    <i class="bx bx-plus-circle"></i> Thêm món ăn mới
                </h3>
                <div class="tile-body">
                    <form action="{{ route('admin.mon-an.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Cột trái --}}
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Tên món <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ten_mon"
                                           value="{{ old('ten_mon') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                                    <select name="danh_muc_id" class="form-select" required>
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($danhMucs as $dm)
                                            <option value="{{ $dm->id }}">{{ $dm->ten_danh_muc }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="gia" min="0"
                                           value="{{ old('gia') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mô tả</label>
                                    <textarea class="form-control" name="mo_ta" rows="3">{{ old('mo_ta') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Thời gian chế biến (phút)
                                        <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" min="1"
                                           name="thoi_gian_che_bien" value="{{ old('thoi_gian_che_bien') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                                    <select name="trang_thai" class="form-select" required>
                                        <option value="con">Còn món</option>
                                        <option value="het">Hết món</option>
                                        <option value="an">Ẩn khỏi menu</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Loại món</label>
                                    <select name="loai_mon" class="form-select">
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
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Ảnh món ăn</label>
                                    <input type="file" name="hinh_anh" class="form-control" accept="image/*"
                                           onchange="previewImage(event)">
                                </div>
                                <div class="text-center mt-3">
                                    <div class="border rounded bg-white p-2 shadow-sm d-inline-block">
                                        <img id="preview" src="#" class="img-fluid rounded d-none"
                                             style="max-height: 200px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Nút --}}
                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="bx bx-check-circle me-1"></i> Thêm món
                            </button>
                            <a href="{{ route('admin.mon-an.index') }}" class="btn btn-secondary btn-sm">
                                <i class="bx bx-arrow-back me-1"></i> Quay lại
                            </a>
                        </div>
                    </form>
                </div> {{-- tile-body --}}
            </div> {{-- tile --}}
        </div>
    </div>
</div>

{{-- Preview ảnh --}}
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    }
}
</script>

<style>
    .tile {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    .form-control, .form-select {
        border-radius: 6px;
        border: 1px solid #275583;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
        transition: all 0.2s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13,110,253,0.15);
    }
    .btn-primary {
        background-color: #275583;
        border: none;
    }
    .btn-primary:hover {
        background-color: #1f446b;
    }
    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }
</style>
@endsection
