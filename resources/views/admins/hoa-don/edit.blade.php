@extends('layouts.admins.layout-admin')

@section('title', 'Sửa hóa đơn')

@section('content')
<main class="app-content">
    <h1>Sửa hóa đơn #{{ $hoaDon->id }}</h1>

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
            <label>Bàn</label>
            <select name="dat_ban_id" class="form-control" required>
                @foreach($datBans as $ban)
                <option value="{{ $ban->id }}"
                    {{ old('dat_ban_id', $hoaDon->dat_ban_id) == $ban->id ? 'selected' : '' }}>
                    {{ $ban->banAn->ten_ban ?? $ban->id }} |
                    Khách: {{ $ban->ten_khach }} |
                    Số khách: {{ $ban->so_khach }} |
                    Combo: {{ $ban->comboBuffet->ten_combo ?? 'Không có' }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Phương thức thanh toán</label>
            <select name="phuong_thuc_tt" class="form-control" required>
                <option value="tien_mat"
                    {{ old('phuong_thuc_tt', $hoaDon->phuong_thuc_tt) == 'tien_mat' ? 'selected' : '' }}>Tiền mặt
                </option>
                <option value="chuyen_khoan"
                    {{ old('phuong_thuc_tt', $hoaDon->phuong_thuc_tt) == 'chuyen_khoan' ? 'selected' : '' }}>Chuyển
                    khoản</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tiền giảm</label>
            <input type="number" name="tien_giam" value="{{ old('tien_giam', $hoaDon->tien_giam) }}"
                class="form-control">
        </div>

        <div class="form-group">
            <label>Phụ thu</label>
            <input type="number" name="phu_thu" value="{{ old('phu_thu', $hoaDon->phu_thu) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Đã thanh toán</label>
            <input type="number" name="da_thanh_toan" value="{{ old('da_thanh_toan', $hoaDon->da_thanh_toan) }}"
                class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Cập nhật hóa đơn</button>
    </form>
</main>
@endsection