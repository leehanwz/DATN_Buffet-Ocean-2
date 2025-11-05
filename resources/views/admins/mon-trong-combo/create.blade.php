@extends('layouts.admins.layout-admin')

@section('title', 'Thêm món vào combo')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý combo</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.mon-trong-combo.index') }}">Danh sách món trong
                    combo</a></li>
            <li class="breadcrumb-item">Thêm món vào combo</li>
        </ul>
        <!-- ĐÃ THÊM LẠI ĐỒNG HỒ -->
        <div id="clock"></div>
    </div>

    <div class="tile">
        <h3 class="tile-title">Thêm món vào combo</h3>
        
        <form action="{{ route('admin.mon-trong-combo.store') }}" method="POST">
            @csrf
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="combo_id" class="form-label">Chọn combo <span class="text-danger">*</span></label>
                        <select name="combo_id" id="combo_id" class="form-control select2bs4 @error('combo_id') is-invalid @enderror"
                            required>
                            <option value="">-- Chọn combo --</option>
                            @foreach($combos as $combo)
                            <option value="{{ $combo->id }}" {{ old('combo_id') == $combo->id ? 'selected' : '' }}>
                                {{ $combo->ten_combo }}
                            </option>
                            @endforeach
                        </select>
                        @error('combo_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="mon_an_id" class="form-label">Chọn món ăn <span class="text-danger">*</span></label>
                        <select name="mon_an_id" id="mon_an_id" class="form-control select2bs4 @error('mon_an_id') is-invalid @enderror"
                            required>
                            <option value="">-- Chọn món ăn --</option>
                            @foreach($monAns as $mon)
                            <option value="{{ $mon->id }}" {{ old('mon_an_id') == $mon->id ? 'selected' : '' }}>
                                {{ $mon->ten_mon }}
                            </option>
                            @endforeach
                        </select>
                        @error('mon_an_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gioi_han_so_luong" class="form-label">Giới hạn số lượng</label>
                        <input type="number" name="gioi_han_so_luong" id="gioi_han_so_luong" class="form-control @error('gioi_han_so_luong') is-invalid @enderror"
                            value="{{ old('gioi_han_so_luong') }}" min="1" placeholder="Để trống nếu không giới hạn">
                        @error('gioi_han_so_luong')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phu_phi_goi_them" class="form-label">Phụ phí gọi thêm</label>
                        <input type="number" name="phu_phi_goi_them" id="phu_phi_goi_them" class="form-control @error('phu_phi_goi_them') is-invalid @enderror"
                            value="{{ old('phu_phi_goi_them') }}" min="0" placeholder="Nhập 0 nếu không có phụ phí">
                        @error('phu_phi_goi_them')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="tile-footer">
                <a href="{{ route('admin.mon-trong-combo.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Hủy</a>
                <button type="submit" class="btn btn-add"><i class="fas fa-plus-circle me-2"></i>Thêm mới</button>
            </div>
        </form>
    </div>
</main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2bs4').select2({
            theme: 'bootstrap4' 
        });
    });
</script>
@endpush