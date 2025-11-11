@extends('layouts.admins.layout-admin')

@section('title', 'Sửa hóa đơn')

@section('content')
<main class="app-content">
    <h1>Sửa hóa đơn #{{ $hoaDon->ma_hoa_don }} (Bàn: {{ $hoaDon->datBan->banAn->ten_ban ?? 'N/A' }})</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.hoa-don.update', $hoaDon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Bàn (Không thể thay đổi)</label>
            <input type="text" class="form-control" 
                   value="Bàn {{ $hoaDon->datBan->banAn->ten_ban ?? $hoaDon->dat_ban_id }} | Khách: {{ $hoaDon->datBan->ten_khach }} | Combo: {{ $hoaDon->datBan->comboBuffet->ten_combo ?? 'Không có' }}" 
                   readonly>
            </div>

        <div class="form-group">
            <label>Phương thức thanh toán</label>
            <select name="phuong_thuc_tt" class="form-control" required>
                <option value="Tiền mặt"
                    {{ old('phuong_thuc_tt', $hoaDon->phuong_thuc_tt) == 'Tiền mặt' ? 'selected' : '' }}>Tiền mặt
                </option>
                <option value="Chuyển khoản ngân hàng"
                    {{ old('phuong_thuc_tt', $hoaDon->phuong_thuc_tt) == 'Chuyển khoản ngân hàng' ? 'selected' : '' }}>Chuyển
                    khoản ngân hàng</option>
                <option value="Thẻ Visa/Mastercard"
                    {{ old('phuong_thuc_tt', $hoaDon->phuong_thuc_tt) == 'Thẻ Visa/Mastercard' ? 'selected' : '' }}>Thẻ Visa/Mastercard</option>
                <option value="Ví điện tử Momo"
                    {{ old('phuong_thuc_tt', $hoaDon->phuong_thuc_tt) == 'Ví điện tử Momo' ? 'selected' : '' }}>Ví điện tử Momo</option>
            </select>
        </div>

        <hr>

        <div class="form-group">
            <label>Tổng Tiền Gốc (Từ Order)</label>
            <input type="text" value="{{ number_format($hoaDon->tong_tien) }} VND" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Tiền cọc (Đã trả trước)</label>
            <input type="text" value="{{ number_format($hoaDon->datBan->tien_coc ?? 0) }} VND" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Tiền giảm</label>
            <input type="number" name="tien_giam" value="{{ old('tien_giam', $hoaDon->tien_giam) }}"
                class="form-control" placeholder="0">
        </div>

        <div class="form-group">
            <label>Phụ thu</label>
            <input type="number" name="phu_thu" value="{{ old('phu_thu', $hoaDon->phu_thu) }}" class="form-control" placeholder="0">
        </div>

        <div class="form-group">
            <label>Đã thanh toán (Sửa nếu cần ghi đè)</label>
            <input type="number" name="da_thanh_toan" value="{{ old('da_thanh_toan', $hoaDon->da_thanh_toan) }}"
                class="form-control">
            <small class="form-text text-muted">
                Nếu để trống, hệ thống sẽ tự tính: (Tổng gốc) - (Tiền cọc) - (Giảm giá) + (Phụ thu).
            </small>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật hóa đơn</button>
    </form>
</main>
@endsection