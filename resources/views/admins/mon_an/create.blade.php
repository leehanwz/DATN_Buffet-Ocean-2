@extends('layouts.admins.layout-admin')

@section('title', 'Thêm món ăn')

@section('content')
<main class="app-content">

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="{{ route('admin.san-pham.index') }}">Danh sách món ăn</a></li>
            <li class="breadcrumb-item active"><a href="#"><b>Thêm món ăn</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới món ăn</h3>
                
                <form action="{{ route('admin.san-pham.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

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
                            {{-- Cột trái (Thông tin chính) --}}
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Tên món <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ten_mon"
                                        value="{{ old('ten_mon') }}" required>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Giá (VNĐ) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="gia" min="0"
                                                value="{{ old('gia') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Thời gian chế biến (phút) <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" min="1" name="thoi_gian_che_bien"
                                                value="{{ old('thoi_gian_che_bien') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                    <textarea class="form-control" name="mo_ta"
                                        rows="4">{{ old('mo_ta') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                                            <select name="danh_muc_id" class="form-control" required>
                                                <option value="">-- Chọn danh mục --</option>
                                                @foreach($danhMucs as $dm)
                                                <option value="{{ $dm->id }}" {{ old('danh_muc_id') == $dm->id ? 'selected' : '' }}>
                                                    {{ $dm->ten_danh_muc }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Loại món</label>
                                            <select name="loai_mon" class="form-control">
                                                <option value="">-- Chọn loại món --</option>
                                                <option value="Khai vị" {{ old('loai_mon') == 'Khai vị' ? 'selected' : '' }}>Khai vị</option>
                                                <option value="Món chính" {{ old('loai_mon') == 'Món chính' ? 'selected' : '' }}>Món chính</option>
                                                <option value="Tráng miệng" {{ old('loai_mon') == 'Tráng miệng' ? 'selected' : '' }}>Tráng miệng</option>
                                                <option value="Đồ uống" {{ old('loai_mon') == 'Đồ uống' ? 'selected' : '' }}>Đồ uống</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                                    <div class="d-block mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_con" value="con"
                                                {{ old('trang_thai', 'con') == 'con' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="trang_thai_con">Còn món</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_het" value="het"
                                                {{ old('trang_thai') == 'het' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="trang_thai_het">Hết món</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_an" value="an"
                                                {{ old('trang_thai') == 'an' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="trang_thai_an">Ẩn</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Cột phải (Chỉ còn Ảnh) --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Ảnh món ăn</label>
                                    <input type="file" name="hinh_anh" class="form-control" accept="image/*"
                                        onchange="previewImage(event)">
                                </div>
                                
                                <div class="text-center">
                                    <img id="preview" src="https://placehold.co/200x200/eee/ccc?text=Preview" class="img-fluid rounded border shadow-sm"
                                        style="max-height: 200px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <a href="{{ route('admin.san-pham.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Hủy
                        </a>
                        <button type="submit" class="btn btn-add">
                            <i class="fas fa-plus-circle me-2"></i> Thêm món
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.onload = () => URL.revokeObjectURL(preview.src);
    }
</script>
@endpush