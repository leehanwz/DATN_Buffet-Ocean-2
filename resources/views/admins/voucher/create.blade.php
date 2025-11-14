@extends('layouts.admins.layout-admin')

@section('title', 'Tạo Voucher mới')

@section('content')
<main class="app-content">
    <div class="app-title d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fa fa-ticket-alt"></i> Tạo Voucher mới</h1>
        <a href="{{ route('admin.voucher.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Quay lại
        </a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="tile">
        <form action="{{ route('admin.voucher.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Mã Voucher (VD: SALE50K)</label>
                        <input type="text" name="ma_voucher" class="form-control" value="{{ old('ma_voucher') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Số lượng</label>
                        <input type="number" name="so_luong" class="form-control" value="{{ old('so_luong', 100) }}" min="0" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Loại giảm giá</label>
                        <select name="loai_giam" class="form-control" id="loai_giam" required>
                            <option value="phan_tram" {{ old('loai_giam') == 'phan_tram' ? 'selected' : '' }}>Giảm theo %</option>
                            <option value="tien_mat" {{ old('loai_giam') == 'tien_mat' ? 'selected' : '' }}>Giảm tiền mặt</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Giá trị (Nhập % hoặc số tiền)</label>
                        <input type="number" name="gia_tri" class="form-control" value="{{ old('gia_tri', 0) }}" min="0" required>
                    </div>
                </div>
                <div class="col-md-4" id="gia_tri_toi_da_wrapper">
                    <div class="form-group mb-3">
                        <label>Giảm tối đa (VND)</label>
                        <input type="number" name="gia_tri_toi_da" class="form-control" value="{{ old('gia_tri_toi_da') }}" min="0" placeholder="Bỏ trống nếu không giới hạn">
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label>Mô tả</label>
                <textarea name="mo_ta" class="form-control" rows="3">{{ old('mo_ta') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Ngày bắt đầu</label>
                        <input type="date" name="ngay_bat_dau" class="form-control" value="{{ old('ngay_bat_dau', date('Y-m-d')) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Ngày kết thúc</label>
                        <input type="date" name="ngay_ket_thuc" class="form-control" value="{{ old('ngay_ket_thuc') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Trạng thái</label>
                        <select name="trang_thai" class="form-control" required>
                            <option value="dang_ap_dung" selected>Đang áp dụng</option>
                            <option value="ngung_ap_dung">Ngừng áp dụng</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-2">Lưu Voucher</button>
        </form>
    </div>
</main>

<script>
    // JS để ẩn/hiện ô "Giảm tối đa"
    document.addEventListener('DOMContentLoaded', function() {
        var loaiGiamSelect = document.getElementById('loai_giam');
        var wrapper = document.getElementById('gia_tri_toi_da_wrapper');

        function toggleGiaTriToiDa() {
            if (loaiGiamSelect.value === 'phan_tram') {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        }
        toggleGiaTriToiDa(); // Chạy khi tải trang
        loaiGiamSelect.addEventListener('change', toggleGiaTriToiDa); // Chạy khi thay đổi
    });
</script>
@endsection