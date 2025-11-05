@extends('layouts.admins.layout-admin')
@section('title', 'Thêm đặt bàn')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="app-content">
    <div class="app-title">
        <h4>Thêm đặt bàn mới</h4>
    </div>

    <form action="{{ route('admin.dat-ban.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>Tên khách:</label>
                <input type="text" name="ten_khach" class="form-control" required>

                <label>SĐT:</label>
                <input type="text" name="sdt_khach" class="form-control" required>

                <label>Số khách:</label>
                <input type="number" name="so_khach" class="form-control" min="1" required>

                <label>Chọn bàn:</label>
                <select name="ban_id" class="form-control" required>
                    @foreach ($banAns as $ban)
                        <option value="{{ $ban->id }}">{{ $ban->so_ban }}</option>
                    @endforeach
                </select>

                <label>Chọn combo:</label>
                <select name="combo_id" class="form-control">
                    <option value="">-- Không chọn --</option>
                    @foreach ($combos as $c)
                        <option value="{{ $c->id }}">{{ $c->ten_combo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label>Nhân viên phụ trách:</label>
                <select name="nhan_vien_id" class="form-control">
                    <option value="">-- Không chọn --</option>
                    @foreach ($nhanViens as $nv)
                        <option value="{{ $nv->id }}">{{ $nv->ten_nhan_vien }}</option>
                    @endforeach
                </select>

                <label>Giờ đến:</label>
                <input type="datetime-local" name="gio_den" class="form-control">

                <label>Thời lượng (phút):</label>
                <input type="number" name="thoi_luong_phut" class="form-control">

                <label>Tiền cọc:</label>
                <input type="number" name="tien_coc" class="form-control" step="0.01">

                <label>Ghi chú:</label>
                <textarea name="ghi_chu" class="form-control"></textarea>
            </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-success">Lưu</button>
            <a href="{{ route('admin.dat-ban.index') }}" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>
@endsection
