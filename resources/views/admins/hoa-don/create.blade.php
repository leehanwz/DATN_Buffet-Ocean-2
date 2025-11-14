@extends('layouts.admins.layout-admin')

@section('title', 'Tạo hóa đơn mới')

@section('content')
<main class="app-content">
    <h1>Tạo hóa đơn mới</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.hoa-don.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Chọn Bàn (Đã hoàn tất)</label>
            <select name="dat_ban_id" class="form-control" required>
                <option value="">--- Chọn bàn để tạo hóa đơn ---</option>
                
                @foreach($datBans as $datBan)
                    @php
                        $tongTienOrder = $datBan->orderMon->sum('tong_tien');
                        $tienCoc = $datBan->tien_coc ?? 0;
                    @endphp
                    
                    <option value="{{ $datBan->id }}" {{ old('dat_ban_id') == $datBan->id ? 'selected' : '' }}>
                        Bàn: {{ $datBan->banAn->so_ban ?? 'N/A' }} | 
                        Khách: {{ $datBan->ten_khach }} |
                        Tổng: {{ number_format($tongTienOrder) }}₫ | 
                        Cọc: {{ number_format($tienCoc) }}₫
                    </option>
                @endforeach
            </select>
        </div>

        @if(old('dat_ban_id'))
            @php
                $datBanSelected = $datBans->where('id', old('dat_ban_id'))->first();
                $tongTien = 0;
                $tienCoc = 0;
                
                if($datBanSelected) {
                    if($datBanSelected->orderMon) {
                        $tongTien = $datBanSelected->orderMon->sum('tong_tien');
                    }
                    $tienCoc = $datBanSelected->tien_coc ?? 0;
                }
            @endphp
            <div class="alert alert-info">
                <strong>Tổng tiền món (tạm tính): </strong> {{ number_format($tongTien) }}₫ <br>
                <strong>Tiền cọc đã trả: </strong> {{ number_format($tienCoc) }}₫
            </div>
        @endif

        {{-- SỬA: Thêm ô chọn Voucher --}}
        <div class="form-group mb-3">
            <label>Chọn Voucher (Nếu có)</label>
            <select name="voucher_id" class="form-control">
                <option value="">--- Không dùng voucher ---</option>
                @foreach($vouchers as $voucher)
                    <option value="{{ $voucher->id }}" {{ old('voucher_id') == $voucher->id ? 'selected' : '' }}>
                        [{{ $voucher->ma_voucher }}] - {{ $voucher->mo_ta }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Phương thức thanh toán</label>
            <select name="phuong_thuc_tt" class="form-control" required>
                <option value="Tiền mặt" {{ old('phuong_thuc_tt') == 'Tiền mặt' ? 'selected' : '' }}>Tiền mặt</option>
                <option value="Chuyển khoản ngân hàng" {{ old('phuong_thuc_tt') == 'Chuyển khoản ngân hàng' ? 'selected' : '' }}>Chuyển khoản ngân hàng</option>
                <option value="Ví điện tử Momo" {{ old('phuong_thuc_tt') == 'Ví điện tử Momo' ? 'selected' : '' }}>Ví điện tử Momo</option>
                <option value="Thẻ Visa/Mastercard" {{ old('phuong_thuc_tt') == 'Thẻ Visa/Mastercard' ? 'selected' : '' }}>Thẻ Visa/Mastercard</option>
            </select>
        </div>

        {{-- SỬA: Xóa ô Tiền Giảm. Controller sẽ tự tính --}}

        <div class="form-group mb-3">
            <label>Phụ thu</label>
            <input type="number" name="phu_thu" value="{{ old('phu_thu', 0) }}" min="0" class="form-control" placeholder="0">
        </div>
        
        <small class="form-text text-muted mb-3">
            *Lưu ý: Tiền cọc (nếu có) và Tiền giảm (từ voucher) sẽ tự động được trừ vào tổng thanh toán.
        </small>

        <br>
        <button type="submit" class="btn btn-success mt-2">Tạo hóa đơn</button>
    </form>
</main>
@endsection