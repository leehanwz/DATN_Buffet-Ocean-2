@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Chi tiết Order')

@section('content')
<main class="app-content">

    <h3>Chi tiết Order #{{ $order->id }}</h3>
    <p><b>Bàn:</b> {{ $order->banAn->so_ban ?? 'Không xác định' }}</p>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif


    <a href="{{ route('nhanvien.chi-tiet-order.create', ['order_id' => $order->id]) }}"
        class="btn btn-primary mb-3">
        + Thêm món mới vào order
    </a>
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
                <td>{{ $ct->monAn->ten_mon ?? 'Không xác định' }}</td>
                <td>{{ $ct->so_luong_hien_thi }}</td>
                <td>{{ $ct->ghi_chu }}</td>
                <td>
                    @if ($ct->loai_mon === 'combo')
                    <a href="{{ route('nhanvien.chi-tiet-order.edit', [$order->id, $ct->id]) }}"
                        class="btn btn-sm btn-warning">Sửa</a>
                    <span class="text-muted ms-2"></span>
                    @elseif ($ct->loai_mon === 'goi_them')
                    <a href="{{ route('nhanvien.chi-tiet-order.edit', [$order->id, $ct->id]) }}"
                        class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('nhanvien.chi-tiet-order.destroy', $ct->id) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</main>
@endsection
