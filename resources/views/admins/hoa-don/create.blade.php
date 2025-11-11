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
            <label>Bàn</label>
            <select name="dat_ban_id" class="form-control" required>
                <option value="">Chọn bàn</option>
                @foreach($datBans as $datBan)
                <option value="{{ $datBan->id }}" {{ old('dat_ban_id') == $datBan->id ? 'selected' : '' }}>
                    Bàn: {{ $datBan->banAn->ten_ban ?? 'N/A' }} |
                    Khách: {{ $datBan->ten_khach }} |
                    Số khách: {{ $datBan->so_khach }} |
                    Combo: {{ $datBan->comboBuffet->ten_combo ?? 'Không có' }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Phương thức thanh toán</label>
            <select name="phuong_thuc_tt" class="form-control" required>
                <option value="tien_mat" {{ old('phuong_thuc_tt') == 'tien_mat' ? 'selected' : '' }}>Tiền mặt</option>
                <option value="chuyen_khoan" {{ old('phuong_thuc_tt') == 'chuyen_khoan' ? 'selected' : '' }}>Chuyển
                    khoản</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Tiền giảm</label>
            <input type="number" name="tien_giam" value="{{ old('tien_giam', 0) }}" min="0" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Phụ thu</label>
            <input type="number" name="phu_thu" value="{{ old('phu_thu', 0) }}" min="0" class="form-control">
        </div>

        {{-- Tùy chọn hiển thị tổng tiền món combo + order món (chỉ admin xem) --}}
        @if(old('dat_ban_id'))
        @php
        $datBanSelected = $datBans->where('id', old('dat_ban_id'))->first();
        $tongTien = 0;
        if($datBanSelected) {
        // Combo
        if($datBanSelected->comboBuffet) {
        foreach($datBanSelected->comboBuffet->monTrongCombo as $mon) {
        $tongTien += ($mon->so_luong ?? 0) * ($mon->gia ?? 0);
        }
        }
        // Order món thêm
        foreach($datBanSelected->orderMons as $order) {
        $tongTien += ($order->so_luong ?? 0) * ($order->gia ?? 0);
        }
        }
        @endphp
        <div class="alert alert-info">
            <strong>Tổng tiền món hiện tại: </strong> {{ number_format($tongTien) }}₫
        </div>
        @endif

        <button type="submit" class="btn btn-success">Tạo hóa đơn</button>
    </form>
</main>
@endsection