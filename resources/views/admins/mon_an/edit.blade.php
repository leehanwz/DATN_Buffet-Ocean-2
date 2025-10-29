@extends('layouts.admins.layout-admin')

@section('title', 'Sửa món ăn')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0">
            <h3 class="fw-bold text-primary mb-0">
                <i class="bi bi-pencil-square me-2"></i> Sửa món ăn
            </h3>
        </div>

        <div class="card-body bg-light">
            {{-- Hiển thị lỗi --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.mon-an.update', $mon_an->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Cột trái --}}
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="ten_mon" class="form-label fw-semibold">Tên món <span class="text-danger">*</span></label>
                            <input type="text" class="form-control custom-input" name="ten_mon" value="{{ old('ten_mon', $mon_an->ten_mon) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="danh_muc_id" class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                            <div class="custom-select-wrapper">
                                <select name="danh_muc_id" class="form-select fancy-select pe-5" required>
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach($danhMucs as $dm)
                                        <option value="{{ $dm->id }}" {{ old('danh_muc_id', $mon_an->danh_muc_id) == $dm->id ? 'selected' : '' }}>
                                            {{ $dm->ten_danh_muc }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="bi bi-chevron-down custom-arrow"></i>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gia" class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control custom-input" name="gia" value="{{ old('gia', $mon_an->gia) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="mo_ta" class="form-label fw-semibold">Mô tả</label>
                            <textarea class="form-control custom-input" name="mo_ta" rows="3">{{ old('mo_ta', $mon_an->mo_ta) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thoi_gian_che_bien" class="form-label fw-semibold">Thời gian chế biến (phút) <span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control custom-input" name="thoi_gian_che_bien" value="{{ old('thoi_gian_che_bien', $mon_an->thoi_gian_che_bien) }}" required>
                        </div>
                          {{-- Trạng thái --}}
                        <div class="mb-3">
                            <label for="trang_thai" class="form-label fw-semibold text-primary d-flex align-items-center gap-2">
                                <i class="bi bi-toggle-on"></i> Trạng thái
                            </label>
                            <div class="custom-select-wrapper">
                                <select name="trang_thai" id="trang_thai" class="form-select fancy-select pe-5" required>
                                    <option value="1" {{ old('trang_thai', $mon_an->trang_thai) == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('trang_thai', $mon_an->trang_thai) == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                                <i class="bi bi-chevron-down custom-arrow"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Cột phải --}}
                    <div class="col-md-4">
                        {{-- Ảnh món ăn --}}
                        <div class="mb-4">
                            <label for="hinh_anh" class="form-label fw-semibold">Ảnh món ăn</label>
                            <input type="file" class="form-control custom-input" name="hinh_anh" id="hinh_anh" accept="image/*" onchange="previewImage(event)">
                            <div class="mt-3 text-center">
                                <div class="preview-wrapper border rounded-3 bg-white p-2 shadow-sm d-inline-block">
                                    @if($mon_an->hinh_anh)
                                        <img id="preview" src="{{ asset($mon_an->hinh_anh) }}" alt="Ảnh món ăn" class="img-fluid rounded-3" style="max-height: 200px; object-fit: cover;">
                                    @else
                                        <img id="preview" src="#" alt="Xem trước ảnh" class="img-fluid rounded-3 d-none" style="max-height: 200px; object-fit: cover;">
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                {{-- Nút hành động --}}
                <div class="mt-1">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Cập nhật
                    </button>
                    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Hủy
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
    .custom-input, .fancy-select {
        border-radius: 10px;
        border: 1px solid #275583ff;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
        transition: all 0.2s;
    }

    .custom-input:focus, .fancy-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13,110,253,0.15);
    }

    .preview-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 180px;
        max-width: 100%;
    }

    .custom-arrow {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
    }

    .custom-select-wrapper {
        position: relative;
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
