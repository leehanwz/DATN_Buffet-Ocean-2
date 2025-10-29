@extends('layouts.admins.layout-admin')

@section('title', 'Thêm món ăn')

@section('content')
<div class="container-fluid mt-2" style="background-color: #f8f9fa; min-height: 100vh; padding: 20px;">

    <div class="card shadow-sm border-0 rounded-4" style="background-color: #ffffff;">
        <div class="card-header" style="background: linear-gradient(90deg, #0d6efd, #4c73ff); color: white; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Thêm món ăn mới</h4>
        </div>

        <div class="card-body p-4">
            {{-- Hiển thị lỗi --}}
            @if($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.mon-an.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    {{-- Cột trái --}}
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="ten_mon" class="form-label fw-semibold">Tên món <span class="text-danger">*</span></label>
                            <input type="text" class="form-control custom-input" name="ten_mon" value="{{ old('ten_mon') }}" placeholder="Nhập tên món..." required>
                        </div>

                        <div class="mb-3">
                            <label for="danh_muc_id" class="form-label fw-semibold text-primary d-flex align-items-center gap-2">
                                <i class="bi bi-list-ul"></i> Danh mục <span class="text-danger">*</span>
                            </label>
                            <div class="custom-select-wrapper">
                                <select name="danh_muc_id" id="danh_muc_id" class="form-select fancy-select pe-5" required>
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach($danhMucs as $dm)
                                    <option value="{{ $dm->id }}" {{ old('danh_muc_id') == $dm->id ? 'selected' : '' }}>
                                        {{ $dm->ten_danh_muc }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="bi bi-chevron-down custom-arrow"></i>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gia" class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" name="gia" min="0" value="{{ old('gia') }}" placeholder="Nhập giá..." required>
                        </div>

                        <div class="mb-3">
                            <label for="mo_ta" class="form-label fw-semibold">Mô tả</label>
                            <textarea class="form-control custom-input" name="mo_ta" rows="3" placeholder="Mô tả ngắn về món ăn...">{{ old('mo_ta') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thoi_gian_che_bien" class="form-label fw-semibold">Thời gian chế biến (phút) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" name="thoi_gian_che_bien" min="0" value="{{ old('thoi_gian_che_bien') }}" placeholder="VD: 15" required>
                        </div>
                        {{-- Trạng thái --}}
                        <div class="mb-3">
                            <label for="trang_thai" class="form-label fw-semibold text-primary d-flex align-items-center gap-2">
                                <i class="bi bi-toggle-on"></i> Trạng thái <span class="text-danger">*</span>
                            </label>
                            <div class="custom-select-wrapper">
                                <select name="trang_thai" id="trang_thai" class="form-select fancy-select pe-5" required>
                                    <option value="1" {{ old('trang_thai') ?? 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('trang_thai') ?? 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                                <i class="bi bi-chevron-down custom-arrow"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Cột phải --}}
                    <div class="col-md-4 d-flex flex-column">
                        {{-- Ảnh món ăn --}}
                        <div class="mb-4">
                            <label for="hinh_anh" class="form-label fw-semibold">Ảnh món ăn</label>
                            <input type="file" class="form-control custom-input" name="hinh_anh" id="hinh_anh" accept="image/*" onchange="previewImage(event)">
                            <div class="mt-3 text-center">
                                <img id="preview" src="#" alt="Xem trước ảnh" class="img-fluid rounded-3 border shadow-sm d-none" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>
                </div> {{-- Nút bấm --}}
                <div class="mt-2 ">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bi bi-check-circle"></i> Lưu món ăn
                    </button>
                    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bi bi-x-circle"></i> Hủy
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
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('d-none');
        }
    }
</script>

<style>
    .custom-select-wrapper {
        position: relative;
    }

    .custom-arrow {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
        font-size: 0.9rem;
    }

    /* Input & Select chung style */
    .custom-input,
    .fancy-select {
        border-radius: 10px;
        border: 1px solid #d0d4da;
        padding: 10px 14px;
        font-weight: 500;
        background-color: #fdfdfd;
        transition: all 0.25s ease;
        appearance: none !important;
    }

    .custom-input:focus,
    .fancy-select:focus {
        background-color: #ffffff;
        border-color: #86b7fe;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
    }

    .fancy-select:hover,
    .custom-input:hover {
        background-color: #ffffff;
    }

    .form-label.text-primary {
        color: #0d6efd !important;
        font-weight: 600;
    }

    /* Card nhẹ hơn */
    .card {
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

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
        margin-left: 250px;
        /* chừa chỗ cho sidebar */
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
