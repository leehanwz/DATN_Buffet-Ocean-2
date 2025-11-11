@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết hóa đơn')

@section('content')
<main class="app-content">
    {{-- 
        SỬA 1: Thay 'ma_hoa_don' cho 'id' để thân thiện hơn
    --}}
    <h1>Hóa đơn #{{ $hoaDon->ma_hoa_don }}</h1>

    <div class="mb-3">
        {{-- 
            SỬA 2: Dùng 'so_ban' (từ CSDL) thay vì 'ten_ban' (không tồn tại)
        --}}
        <p><strong>Bàn:</strong> {{ $hoaDon->datBan->banAn->so_ban ?? 'N/A' }}</p>
        <p><strong>Khách:</strong> {{ $hoaDon->datBan->ten_khach ?? 'N/A' }}</p>
        <p><strong>Số khách:</strong> {{ $hoaDon->datBan->so_khach ?? 'N/A' }}</p>
        <p><strong>Tổng tiền:</strong> {{ number_format($hoaDon->tong_tien ?? 0) }} VND</p>
        <p><strong>Tiền giảm:</strong> {{ number_format($hoaDon->tien_giam ?? 0) }} VND</p>
        <p><strong>Phụ thu:</strong> {{ number_format($hoaDon->phu_thu ?? 0) }} VND</p>
        <p><strong>Đã thanh toán:</strong> {{ number_format($hoaDon->da_thanh_toan ?? 0) }} VND</p>
        <p><strong>Phương thức thanh toán:</strong>
            {{ $hoaDon->phuong_thuc_tt ?? 'N/A' }}</p>
        <p><strong>Ngày tạo:</strong> {{ $hoaDon->created_at?->format('d/m/Y H:i') ?? 'N/A' }}</p>
    </div>

    <h3>Chi tiết món ăn</h3>
    
    {{-- 
        SỬA 3: Lỗi gọi 'orderMons'. 
        Phải kiểm tra 'orderMon' bên trong 'datBan'.
    --}}
    @if($hoaDon->datBan->orderMon->isEmpty())
    <div class="alert alert-info">Chưa có món ăn nào được order.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Món ăn</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            {{-- 
                SỬA 4: Lỗi gọi 'orderMons'. 
                Phải lặp qua 'orderMon' bên trong 'datBan'.
            --}}
            @foreach($hoaDon->datBan->orderMon as $order)
                
                {{-- Vòng lặp bên trong này đã đúng, vì $order là một OrderMon --}}
                @foreach($order->chiTietOrders as $ct)
                <tr>
                    {{-- 
                        (Giả sử ChiTietOrder model có hàm 'monAn' 
                        và MonAn model có 'ten_mon' và 'gia')
                    --}}
                    <td>{{ $ct->monAn->ten_mon ?? 'N/A' }}</td>
                    <td>{{ $ct->so_luong }}</td>
                    <td>{{ number_format($ct->monAn->gia ?? 0) }} VND</td>
                    <td>{{ number_format(($ct->monAn->gia ?? 0) * $ct->so_luong) }} VND</td>
                </tr>
                @endforeach

            @endforeach
        </tbody>
    </table>
    @endif
</main>
@endsection