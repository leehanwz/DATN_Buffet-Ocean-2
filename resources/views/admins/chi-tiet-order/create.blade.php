@extends('layouts.admins.layout-admin')

@section('title', 'Thêm món ăn vào đơn hàng')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.chi-tiet-order.index') }}">Chi tiêt order</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới món ăn vào bàn : Bàn-số {{ $order->id }}</li>
        </ul>
    </div>

    <div class="tile">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="tile-title">Thêm món ăn mới : Bàn- {{ $order->id }}</h3>
            <a href="{{ route('admin.chi-tiet-order.index', ['order_id' => $order->id]) }}" class="btn btn-secondary">
                <i class='bx bx-arrow-back'></i> Quay lại
            </a>
        </div>

        <h4 class="mb-4">Thông tin món ăn</h4>

        <form action="{{ route('admin.chi-tiet-order.store') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mon_an_id" class="form-label fw-bold">Chọn món ăn</label>
                    <select name="mon_an_id" id="mon_an_id" class="form-select" required>
                        <option value="">-- Chọn món ăn --</option>
                        @foreach($monAns as $mon)
                        <option value="{{ $mon->id }}">
                            {{ $mon->ten_mon }} — {{ number_format($mon->gia, 0, ',', '.') }}đ ({{ $mon->loai_mon }})
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="so_luong" class="form-label fw-bold">Số lượng</label>
                    <input type="number" name="so_luong" id="so_luong"
                        class="form-control" value="1" min="1" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="ghi_chu" class="form-label fw-bold">Ghi chú (nếu có)</label>
                <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="2"
                    placeholder="Nhập ghi chú cho món (nếu cần)"></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">
                    <i class='bx bx-save'></i> Lưu món ăn
                </button>
                <a href="{{ route('admin.chi-tiet-order.index', ['order_id' => $order->id]) }}" class="btn btn-secondary">
                    <i class='bx bx-x'></i> Hủy
                </a>
            </div>
        </form>
    </div>
</main>
@endsection