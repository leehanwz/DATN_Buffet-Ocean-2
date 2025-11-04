@extends('layouts.admins.layout-admin')

@section('title', 'Sửa món trong combo')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý combo</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.mon-trong-combo.index') }}">Danh sách món trong
                    combo</a></li>
            <li class="breadcrumb-item">Sửa món trong combo</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Sửa món trong combo</h3>
        
        <form action="{{ route('admin.mon-trong-combo.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Bắt buộc phải có 'PUT' cho update --}}

            <div class="tile-body">
                <div class="row">
                    {{-- Combo (Chỉ đọc) --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Combo (Không thể thay đổi)</label>
                        <input type="text" class="form-control" value="{{ $item->combo->ten_combo ?? 'N/A' }}" readonly>
                    </div>

                    {{-- Món Ăn (Chỉ đọc) --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Món ăn (Không thể thay đổi)</label>
                        <input type="text" class="form-control" value="{{ $item->monAn->ten_mon ?? 'N/A' }}" readonly>
                    </div>
                </div>

                <div class="row">
                    {{-- Giới Hạn Số Lượng --}}
                    <div class="col-md-6 mb-3">
                        {{-- LỖI ĐÃ SỬA: Tên trường (theo DB) --}}
                        <label for="gioi_han_so_luong" class="form-label">Giới hạn số lượng</label>
                        <input type="number" name="gioi_han_so_luong" id="gioi_han_so_luong" 
                               class="form-control @error('gioi_han_so_luong') is-invalid @enderror"
                               value="{{ old('gioi_han_so_luong', $item->gioi_han_so_luong) }}" 
                               min="1" placeholder="Để trống nếu không giới hạn">
                        @error('gioi_han_so_luong')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Phụ Phí Gọi Thêm --}}
                    <div class="col-md-6 mb-3">
                        {{-- LỖI ĐÃ SỬA: Tên trường (theo DB) --}}
                        <label for="phu_phi_goi_them" class="form-label">Phụ phí gọi thêm</label>
                        <input type="number" name="phu_phi_goi_them" id="phu_phi_goi_them" 
                               class="form-control @error('phu_phi_goi_them') is-invalid @enderror"
                               value="{{ old('phu_phi_goi_them', $item->phu_phi_goi_them) }}" 
                               min="0" placeholder="Nhập 0 nếu không có phụ phí">
                        @error('phu_phi_goi_them')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="tile-footer">
                <a href="{{ route('admin.mon-trong-combo.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Hủy
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Cập nhật
                </button>
            </div>
        </form>
    </div>
</main>
@endsection