@extends('layouts.Shop.layout-bep')

@section('title', 'Bếp')

@section('content')
<main class="app-content">
    <h2>Danh sách order đã gửi bếp</h2>

    @if($orders->isEmpty())
    <p>Chưa có order nào gửi bếp</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Bàn số</th>
                <th>Tổng món</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->banAn->so_ban }}</td>
                <td>{{ $order->tong_mon }}</td>
                <td>{{ number_format($order->tong_tien) }} đ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</main>
@endsection
