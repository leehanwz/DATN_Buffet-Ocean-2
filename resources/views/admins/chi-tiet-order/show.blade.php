@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết đơn hàng : bàn-'.$order->id)

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.chi-tiet-order.index') }}">Danh sách order</a>
            </li>
            <li class="breadcrumb-item active">Chi tiết order : bàn-{{ $order->id }}</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Thông tin bàn</h3>
        <div class="tile-body mb-3">
            <p><strong>Mã order:</strong> ORDER-{{ str_pad($order->id, 0, '0', STR_PAD_LEFT) }}</p>
            <p><strong>Tên khách:</strong> {{ $order->datBan->ten_khach ?? 'N/A' }}</p>
            <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

            <h4 class="mt-4">Danh sách món ăn trong đơn</h4>
            <table class="table table-bordered text-center align-middle" style="table-layout: fixed; width: 100%;">
                <thead style="background-color: #002b5b; color: white;">
                    <tr>
                        <th>Tên món</th>
                        <th>Số lượng</th>
                        <th>Loại món</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->chiTietOrders as $ct)
                    <tr>
                        <td>{{ $ct->monAn->ten_mon ?? 'N/A' }}</td>
                        <td>{{ $ct->so_luong }}</td>
                        <td>
                            @if ($ct->loai_mon === 'combo')
                            <span class="badge bg-primary">Combo buffet</span>
                            @elseif ($ct->loai_mon === 'goi_them')
                            <span class="badge bg-secondary">Món gọi thêm</span>
                            @else
                            <span class="badge bg-light text-dark">Không xác định</span>
                            @endif
                        </td>
                        <td>
                            @switch($ct->trang_thai)
                            @case('cho_bep')
                            <span class="badge bg-warning text-dark">Chờ bếp</span>
                            @break
                            @case('dang_che_bien')
                            <span class="badge bg-info text-dark">Đang chế biến</span>
                            @break
                            @case('da_len_mon')
                            <span class="badge bg-success">Đã lên món</span>
                            @break
                            @case('huy_mon')
                            <span class="badge bg-danger">Hủy món</span>
                            @break
                            @default
                            <span class="badge bg-secondary">Không xác định</span>
                            @endswitch
                        </td>
                        <td>{{ $ct->ghi_chu ?? '' }}</td>
                        <td>
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
                        <td colspan="6" class="text-muted">Chưa có món ăn trong đơn hàng này.</td>
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