@extends('layouts.admins.layout-admin')

@section('title', 'Sửa món trong Order')

@section('content')
<main class="app-content">
    <h3>Sửa món: {{ $ct->monAn->ten_mon }}</h3>

    <form action="{{ route('nhanvien.chi-tiet-order.update', $ct->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <div class="mb-3">
            <label>Số lượng</label>
            <input type="number" name="so_luong" class="form-control" value="{{ old('so_luong', $ct->so_luong) }}" min="1" required>
        </div>

        <div class="mb-3">
            <label>Ghi chú</label>
            <input type="text" name="ghi_chu" class="form-control" value="{{ old('ghi_chu', $ct->ghi_chu) }}">
        </div>

        <button class="btn btn-success">Cập nhật</button>
        <a href="{{ route('nhanvien.chi-tiet-order.show', $order->id) }}" class="btn btn-secondary">Hủy</a>
    </form>
</main>
@endsection