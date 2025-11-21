@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Order cho khách')

@section('content')
<main class="app-content">

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active">
                <h2>Order bàn {{ $order->banAn->so_ban }}</h2>
            </li>
        </ul>
    </div>

    {{-- Thông tin bàn & order --}}
    <div class="card shadow-sm mb-3 p-3 rounded-4">
        <h5><b>Bàn số:</b> {{ $order->banAn->so_ban }}</h5>
        <p><b>Order ID:</b> {{ $order->id }}</p>
        <p><b>Tổng món:</b> {{ $order->tong_mon }}</p>
        <p><b>Tổng tiền:</b> {{ number_format($order->tong_tien) }} đ</p>
    </div>

    {{-- Nút chức năng --}}
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('nhanvien.chi-tiet-order.create', ['order_id' => $order->id]) }}"
            class="btn btn-primary fw-semibold">
            ➕ Thêm món
        </a>
    </div>

    {{-- Gửi bếp --}}
    <form action="{{ route('nhanvien.order.gui-bep', $order->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning fw-semibold">📤 Gửi bếp</button>
    </form>

    {{-- Danh sách món --}}
    <div class="card p-3 rounded-4 shadow-sm">
        <h5 class="mb-3">Danh sách món đã chọn</h5>

        @if($order->chiTietOrders->isEmpty())
        <p class="text-muted">Chưa có món nào.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>Món ăn</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->chiTietOrders as $ct)
                <tr>
                    <td>{{ $ct->monAn->ten_mon }}</td>
                    <td>{{ $ct->so_luong_hien_thi }}</td>
                    <td>{{ $ct->ghi_chu }}</td>
                    <td>
                        <a href="{{ route('nhanvien.chi-tiet-order.edit', [$order->id, $ct->id]) }}"
                            class="btn btn-sm btn-warning">Sửa</a>

                        <form action="{{ route('nhanvien.chi-tiet-order.destroy', $ct->id) }}"
                            method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

</main>
@endsection
