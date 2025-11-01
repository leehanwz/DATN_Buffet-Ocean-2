@extends('layouts.admins.layout-admin')

@section('title', 'Sửa món ăn')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Sửa món ăn</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Hiển thị lỗi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
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
                                    <label for="ten_mon" class="form-label">Tên món <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ten_mon" name="ten_mon"
                                           value="{{ old('ten_mon', $mon_an->ten_mon) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="danh_muc_id" class="form-label">Danh mục <span class="text-danger">*</span></label>
                                    <select name="danh_muc_id" id="danh_muc_id" class="form-select" required>
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($danhMucs as $dm)
                                            <option value="{{ $dm->id }}" {{ old('danh_muc_id', $mon_an->danh_muc_id) == $dm->id ? 'selected' : '' }}>
                                                {{ $dm->ten_danh_muc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="gia" class="form-label">Giá (VNĐ) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="gia" name="gia"
                                           value="{{ old('gia', $mon_an->gia) }}" min="0" required>
                                </div>

                                <div class="mb-3">
                                    <label for="mo_ta" class="form-label">Mô tả</label>
                                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3">{{ old('mo_ta', $mon_an->mo_ta) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="thoi_gian_che_bien" class="form-label">Thời gian chế biến (phút) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="thoi_gian_che_bien" name="thoi_gian_che_bien"
                                           value="{{ old('thoi_gian_che_bien', $mon_an->thoi_gian_che_bien) }}" min="0" required>
                                </div>

                                <div class="mb-3">
                                    <label for="loai_mon" class="form-label">Loại món</label>
                                    <select name="loai_mon" id="loai_mon" class="form-select">
                                        <option value="">-- Chọn loại món --</option>
                                        @foreach(['Khai vị','Món chính','Tráng miệng','Đồ uống'] as $loai)
                                            <option value="{{ $loai }}" {{ old('loai_mon', $mon_an->loai_mon) == $loai ? 'selected' : '' }}>
                                                {{ $loai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="trang_thai" class="form-label">Trạng thái</label>
                                    <select name="trang_thai" id="trang_thai" class="form-select" required>
                                        <option value="con" {{ old('trang_thai', $mon_an->trang_thai) == 'con' ? 'selected' : '' }}>Còn món</option>
                                        <option value="het" {{ old('trang_thai', $mon_an->trang_thai) == 'het' ? 'selected' : '' }}>Hết món</option>
                                        <option value="an" {{ old('trang_thai', $mon_an->trang_thai) == 'an' ? 'selected' : '' }}>Ẩn khỏi menu</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Cột phải --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="hinh_anh" class="form-label">Ảnh món ăn</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" accept="image/*" onchange="previewImage(event)">
                                    <div class="mt-2 text-center">
                                        @if($mon_an->hinh_anh)
                                            <img id="preview" src="{{ asset($mon_an->hinh_anh) }}" alt="Ảnh món ăn" style="max-height: 200px;" class="img-thumbnail">
                                        @else
                                            <img id="preview" src="#" alt="Ảnh món ăn" style="max-height: 200px; display:none;" class="img-thumbnail">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật món ăn</button>
                        <a href="{{ route('admin.mon-an.index') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script preview ảnh --}}
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = 'block';
}
</script>
@endsection
