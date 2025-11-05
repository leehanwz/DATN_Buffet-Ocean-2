@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết đơn hàng #'.$order->id)

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.chi-tiet-order.index') }}">Danh sách order</a>
            </li>
            <li class="breadcrumb-item active">Chi tiết order #{{ $order->id }}</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Thông tin bàn</h3>
        <div class="tile-body mb-3">
            <p><strong>Mã order:</strong> {{ $order->datBan->ma_order ?? 'N/A' }}</p>
            <p><strong>Tên khách:</strong> {{ $order->datBan->ten_khach ?? 'N/A' }}</p>
            <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}

            <h4 class="mt-4">Danh sách món ăn trong đơn</h4>
            <table class="table table-bordered text-center align-middle" style="table-layout: fixed; width: 100%;">
                <thead style="background-color: #002b5b; color: white;">
                    <tr>
                        {{-- Cố định độ rộng các cột quan trọng để tránh bị co lại --}}
                        <th>ID</th>
                        <th>Tên món</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Ghi chú</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->chiTietOrders as $ct)
                    <tr>
                        <td>{{ $ct->id }}</td>
                        <td>{{ $ct->monAn->ten_mon ?? 'N/A' }}</td>
                        <td>{{ $ct->so_luong }}</td>
                        <td>
                            {{ number_format($ct->don_gia, 0, ',', '.') }} đ
                        </td>
                        <td>{{ $ct->ghi_chu ?? '' }}</td>
                        <td>
                            {{ number_format($ct->thanh_tien, 0, ',', '.') }} đ
                        </td>
                        <td>
                            {{-- SỬA LỖI LỆCH CỘT LẦN 2: Dùng Flexbox và căn chỉnh chiều rộng tối đa --}}
                            <div class="d-flex justify-content-center align-items-center flex-wrap" style="gap: 5px;">
                                {{-- Nút Sửa --}}
                                <a href="{{ route('admin.chi-tiet-order.edit', $ct->id) }}" class="btn btn-warning btn-sm" style="flex: 1 1 45%; max-width: 50px;">Sửa</a>

                                {{-- Form Xóa --}}
                                <form action="{{ route('admin.chi-tiet-order.destroy', $ct->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa món {{ $ct->monAn->ten_mon ?? 'N/A' }} này khỏi đơn hàng?')" style="flex: 1 1 45%; max-width: 50px;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-100">Xóa</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-muted">Chưa có món ăn trong đơn hàng này.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                <a href="{{ route('admin.chi-tiet-order.index') }}" class="btn btn-secondary">
                    ← Quay lại danh sách order
                </a>
            </div>
        </div>
    </div>
</main>
@endsection