@extends('layouts.admins.layout-admin')

@section('title', 'Sửa hóa đơn')

@section('content')
<main class="app-content">
    <h1>Sửa hóa đơn #{{ $hoaDon->ma_hoa_don }} (Bàn: {{ $hoaDon->datBan->banAn->so_ban ?? 'N/A' }})</h1>

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

        <div class="form-group mb-3">
            <label>Bàn (Không thể thay đổi)</label>
            <input type="text" class="form-control" 
                   value="Bàn {{ $hoaDon->datBan->banAn->so_ban ?? $hoaDon->dat_ban_id }} | Khách: {{ $hoaDon->datBan->ten_khach }} | Combo: {{ $hoaDon->datBan->comboBuffet->ten_combo ?? 'Không có' }}" 
                   readonly>
        </div>

        <div class="form-group mb-3">
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

        <div class="form-group mb-3">
            <label>Tổng Tiền Gốc (Từ Order)</label>
            <input type="text" value="{{ number_format($hoaDon->tong_tien) }} VND" class="form-control" readonly>
        </div>

        <div class="form-group mb-3">
            <label>Tiền cọc (Đã trả trước)</label>
            <input type="text" value="{{ number_format($hoaDon->datBan->tien_coc ?? 0) }} VND" class="form-control" readonly>
        </div>

        <div class="form-group mb-3">
            <label>Voucher</label>
            <select name="voucher_id" class="form-control">
                <option value="">--- Không dùng voucher ---</option>
                @foreach($vouchers as $voucher)
                    <option value="{{ $voucher->id }}" 
                        {{ old('voucher_id', $hoaDon->voucher_id) == $voucher->id ? 'selected' : '' }}>
                        [{{ $voucher->ma_voucher }}] - {{ $voucher->mo_ta }}
                    </option>
                @endforeach
                
                {{-- Hiển thị voucher cũ (nếu có) phòng trường hợp nó hết hạn/hết số lượng --}}
                @if($hoaDon->voucher && !$vouchers->contains($hoaDon->voucher))
                    <option value="{{ $hoaDon->voucher_id }}" selected style="background-color: #fdd">
                        (Đã dùng) [{{ $hoaDon->voucher->ma_voucher }}] - {{ $hoaDon->voucher->mo_ta }}
                    </option>
                @endif
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Phụ thu</label>
            <input type="number" name="phu_thu" value="{{ old('phu_thu', $hoaDon->phu_thu) }}" class="form-control" placeholder="0" min="0">
        </div>

        <small class="form-text text-muted mb-3">
            *Lưu ý: Tiền thanh toán cuối cùng sẽ được tự động tính lại dựa trên: (Tổng gốc) - (Tiền cọc) - (Tiền giảm từ voucher) + (Phụ thu).
        </small>
        <br>
        
        <button type="submit" class="btn btn-success mt-2">Cập nhật hóa đơn</button>
    </form>
</main>
@endsection