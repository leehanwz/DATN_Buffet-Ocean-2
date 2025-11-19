@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết Order')

@section('content')
<main class="app-content">

    <h3>Chi tiết Order #{{ $order->id }}</h3>
    <p><b>Bàn:</b> {{ $order->banAn->so_ban ?? 'Không xác định' }}</p>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <hr>

    <!-- Form thêm món -->
    <form action="{{ route('nhanvien.chi-tiet-order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <div class="row">
            <div class="col-md-4">
                <select name="mon_an_id" class="form-control" required>
                    <option value="">-- Chọn món --</option>
                    @foreach($monAns as $mon)
                    <option value="{{ $mon->id }}">{{ $mon->ten_mon }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <input type="number" name="so_luong" class="form-control" min="1" value="1">
            </div>

            <div class="col-md-4">
                <input type="text" name="ghi_chu" class="form-control" placeholder="Ghi chú">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Thêm món</button>
            </div>
        </div>
    </form>

    <hr>

    <!-- Danh sách món trong order -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Món</th>
                <th>Số lượng</th>
                <th>Ghi chú</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->chiTietOrders as $ct)
            <tr>
                <td>{{ $ct->monAn->ten_mon }}</td>
                <td>{{ $ct->so_luong }}</td>
                <td>{{ $ct->ghi_chu }}</td>

                <td>
                    <!-- Chuyển sửa sang trang edit riêng -->
                    <a href="{{ route('nhanvien.chi-tiet-order.edit', [$order->id, $ct->id]) }}" class="btn btn-sm btn-warning">
                        Sửa
                    </a>

                    <form action="{{ route('nhanvien.chi-tiet-order.destroy', $ct->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</main>
@endsection