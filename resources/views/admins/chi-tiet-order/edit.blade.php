@extends('layouts.admins.layout-admin')

@section('title', 'Chỉnh sửa món ăn trong đơn')

@section('content')

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.chi-tiet-order.index', ['order_id' => $chiTiet->orderMon->id]) }}">
                    Chi tiết đơn #{{ $chiTiet->orderMon->id }}
                </a>
            </li>
            <li class="breadcrumb-item active">Chỉnh sửa món</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Chỉnh sửa món: {{ $chiTiet->monAn->ten_mon ?? 'N/A' }}</h3>
        <p>Đơn hàng: **#{{ $chiTiet->orderMon->id }}** | Đơn giá hiện tại: **{{ number_format($chiTiet->don_gia, 0, ',', '.') }} đ**</p>
        <p class="text-danger">Chỉ được phép thay đổi Số lượng và Ghi chú.</p>

        <div class="tile-body">
            <form class="row" method="POST" action="{{ route('admin.chi-tiet-order.update', $chiTiet->id) }}">
                @csrf
                {{-- Laravel yêu cầu phương thức PUT/PATCH cho Resource Update --}}
                @method('PUT')

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input class="form-control" type="number" name="so_luong" value="{{ old('so_luong', $chiTiet->so_luong) }}" min="1" required>
                        @error('so_luong')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ghi chú (Tùy chọn)</label>
                        <textarea class="form-control" name="ghi_chu" rows="3">{{ old('ghi_chu', $chiTiet->ghi_chu) }}</textarea>
                        @error('ghi_chu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 text-right">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Lưu thay đổi
                    </button>
                    <a href="{{ route('admin.chi-tiet-order.index', ['order_id' => $chiTiet->orderMon->id]) }}" class="btn btn-secondary">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i> Hủy bỏ
                    </a>
                </div>
            </form>
        </div>
    </div>


</main>
@endsection