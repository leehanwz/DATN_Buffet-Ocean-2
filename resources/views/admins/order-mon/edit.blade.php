@extends('layouts.admins.layout-admin')

@section('title', 'Sửa Order món')

@section('content')
<div class="app-content">
    <div class="app-title">
        <h4>Sửa Order món</h4>
    </div>

    <form action="{{ route('admin.order-mon.update', $orderMon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label for="dat_ban_id">Đặt bàn:</label>
                <select name="dat_ban_id" id="dat_ban_id" class="form-control" required>
                    @foreach ($datBans as $db)
                        <option value="{{ $db->id }}" {{ $orderMon->dat_ban_id == $db->id ? 'selected' : '' }}>
                            {{ $db->ma_dat_ban }} - {{ $db->ten_khach }}
                        </option>
                    @endforeach
                </select>

                <label for="ban_id" class="mt-3">Bàn:</label>
                <select name="ban_id" id="ban_id" class="form-control" required>
                    @foreach ($banAns as $ban)
                        <option value="{{ $ban->id }}" {{ $orderMon->ban_id == $ban->id ? 'selected' : '' }}>
                            {{ $ban->so_ban ?? 'Bàn ' . $ban->id }}
                        </option>
                    @endforeach
                </select>

                <label for="tong_mon" class="mt-3">Tổng món:</label>
                <input type="number" name="tong_mon" id="tong_mon" class="form-control" value="{{ $orderMon->tong_mon }}">
            </div>

            <div class="col-md-6">
                <label for="tong_tien">Tổng tiền:</label>
                <input type="number" step="0.01" name="tong_tien" id="tong_tien" class="form-control" value="{{ $orderMon->tong_tien }}">

                <label for="trang_thai" class="mt-3">Trạng thái:</label>
                <select name="trang_thai" id="trang_thai" class="form-control">
                    <option value="cho_bep" {{ $orderMon->trang_thai == 'cho_bep' ? 'selected' : '' }}>Chờ bếp</option>
                    <option value="dang_che_bien" {{ $orderMon->trang_thai == 'dang_che_bien' ? 'selected' : '' }}>Đang chế biến</option>
                    <option value="da_len_mon" {{ $orderMon->trang_thai == 'da_len_mon' ? 'selected' : '' }}>Đã lên món</option>
                    <option value="huy_mon" {{ $orderMon->trang_thai == 'huy_mon' ? 'selected' : '' }}>Hủy món</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
            <a href="{{ route('admin.order-mon.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
