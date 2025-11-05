@extends('layouts.admins.layout-admin')

@section('title', 'Chi tiết Order')

@section('content')

<main class="app-content">

    @if(session('success'))
    <div class="alert alert-success text-center fw-semibold rounded-3 shadow-sm" id="flashMsg">
        {{ session('success') }}
    </div>
    @endif

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="{{ route('admin.san-pham.index') }}"><b>Chi tiết order</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">Chi tiết order</h3>
                </div>

                <div class="tile-body">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Order</th>
                                <th>Tên món</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Ghi chú</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chiTietOrders as $ct)
                            <tr>
                                <td>{{ $ct->id }}</td>
                                <td>{{ $ct->order_id }}</td>
                                <td>{{ $ct->mon->ten_mon ?? 'N/A' }}</td>
                                <td>
                                    <form action="{{ route('admin.chi-tiet-order.update', $ct->id) }}" method="POST" class="d-flex">
                                        @csrf
                                        <input type="number" name="so_luong" value="{{ $ct->so_luong }}" min="1" class="form-control form-control-sm me-2" style="width:80px;">
                                </td>
                                <td>{{ number_format($ct->don_gia) }}₫</td>
                                <td>{{ number_format($ct->so_luong * $ct->don_gia) }}₫</td>
                                <td>
                                    <input type="text" name="ghi_chu" value="{{ $ct->ghi_chu }}" class="form-control form-control-sm" placeholder="Ghi chú...">
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success me-1">Lưu</button>
                                    </form>

                                    <form action="{{ route('admin.chi-tiet-order.destroy', $ct->id) }}" method="POST" onsubmit="return confirm('Xóa món này khỏi đơn?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $chiTietOrders->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Script tự động ẩn thông báo
        setTimeout(() => {
            const msg = document.getElementById('flashMsg');
            if (msg) $(msg).fadeOut(500, () => msg.remove());
        }, 3000);
    });
</script>
@endpush