@extends('layouts.Shop.layout-nhanvien')
@section('title','Tạo đặt bàn')

@section('content')
<div class="card">
    <div class="card-body">
        <h5>Tạo đặt bàn</h5>
        <form action="{{ route('NhanVien.datban.store') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Chọn bàn</label>
                    <select name="ban_an_id" class="form-control" required>
                        @foreach($bans as $ban)
                        <option value="{{ $ban->id }}">{{ $ban->so_ban }} - {{ $ban->khu_vuc ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tên khách</label>
                    <input name="ten_khach" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">SĐT</label>
                    <input name="so_dien_thoai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="so_luong" class="form-control" value="2" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Thời gian đến</label>
                    <input
                        type="datetime-local"
                        name="thoi_gian_den"
                        id="thoiGianDen"
                        class="form-control"
                        required
                        readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nhân viên phục vụ</label>
                    <select name="nhan_vien_id" class="form-control" required>
                        <option value="">-- Chọn nhân viên --</option>
                        @foreach($nhanViens as $nv)
                        <option value="{{ $nv->id }}">{{ $nv->ho_ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="form-label">Ghi chú (nếu có)</label>
                    <textarea name="ghi_chu" class="form-control" rows="3">{{ old('ghi_chu') }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Combo (nếu có)</label>
                <select name="combo_id" class="form-control">
                    <option value="">-- Không chọn --</option>
                    @foreach($combos as $combo)
                    <option value="{{ $combo->id }}">{{ $combo->ten_combo }} - {{ $combo->thoi_luong_phut }} phút</option>
                    @endforeach
                </select>
            </div>
    </div>
</div>

<div class="mt-3">
    <button class="btn btn-primary">Lưu đặt bàn</button>
    <a href="{{ route('NhanVien.datban.index') }}" class="btn btn-outline-secondary">Hủy</a>
</div>
</form>
</div>
</div>
@push('scripts')
<script>
    $('#thoiGianDen').each(function() {
        if ($(this).data("DateTimePicker")) {
            $(this).data("DateTimePicker").destroy();
        }
    });

    function updateTime() {
        let now = new Date();

        // format yyyy-MM-ddTHH:mm (chuẩn cho datetime-local)
        let year = now.getFullYear();
        let month = String(now.getMonth() + 1).padStart(2, '0');
        let day = String(now.getDate()).padStart(2, '0');
        let hour = String(now.getHours()).padStart(2, '0');
        let minute = String(now.getMinutes()).padStart(2, '0');

        let formatted = `${year}-${month}-${day}T${hour}:${minute}`;
        document.getElementById('thoiGianDen').value = formatted;
    }

    updateTime();
    setInterval(updateTime, 1000); // cập nhật mỗi giây
</script>
<style>
    /* TẮT rune của Tempus Dominus */
    .no-picker {
        pointer-events: auto !important;
    }
</style>

@endpush
@endsection