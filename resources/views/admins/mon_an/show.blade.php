@extends('layouts.admins.layout-admin')

@section('content')
<div class="container">
    <h2>Chi tiết món ăn</h2>

    <div class="card" style="max-width:600px">
        <div class="card-body">
            <h4>{{ $mon_an->ten_mon }}</h4>
            <p><strong>Giá:</strong> {{ number_format($mon_an->gia) }}đ</p>
            <p><strong>Mô tả:</strong> {{ $mon_an->mo_ta }}</p>
            <p><strong>Thời gian chế biến:</strong> {{ $mon_an->thoi_gian_che_bien }} phút</p>
            <p><strong>Loại món:</strong> {{ $mon_an->loai_mon }}</p>
            <p><strong>Trạng thái:</strong>
                <span class="badge {{ $mon_an->trang_thai ? 'bg-success' : 'bg-secondary' }}">
                    {{ $mon_an->trang_thai ? 'Hiển thị' : 'Ẩn' }}
                </span>
            </p>
            @if($mon_an->hinh_anh)
                <img src="{{ asset($mon_an->hinh_anh) }}" width="100%">
            @endif
        </div>
    </div>

    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
