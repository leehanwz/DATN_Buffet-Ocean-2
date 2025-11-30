@extends('layouts.Shop.layout-nhanvien')
@section('title','Sơ đồ Bàn')

Echo.channel("datban-channel")
    .listen("KhachDatBanEvent", (data) => {
        this.notifications.push({
            name: data.ten_khach,
            phone: data.sdt
        });
    });
@section('content')
<div class="row">
<div class="col-md-3">
<div class="card p-3">
<h5>Bảng điều hướng</h5>
<a href="{{ route('NhanVien.datban.index') }}" class="btn btn-sm btn-outline-primary mb-2">Đặt bàn</a>
<a href="{{ route('NhanVien.ban.index') }}" class="btn btn-sm btn-outline-secondary mb-2">Làm mới</a>
</div>
</div>
<div class="col-md-9">
<div class="row g-3">
@foreach($bans as $ban)
<div class="col-3">
<div class="card p-2 ban-card @if($ban->trang_thai == 'trong') ban-trong @elseif($ban->trang_thai == 'da_dat') ban-dadat @else ban-dang @endif" onclick="location.href='{{ route('NhanVien.order.index', $ban->id) }}'">
<div class="d-flex justify-content-between align-items-center">
<div>
<h5 class="mb-0">Bàn {{ $ban->so_ban }}</h5>
<small class="text-muted">{{ $ban->khu_vuc ?? 'Khu' }}</small>
</div>
<div>
@if($ban->trang_thai == 'trong')
<span class="badge bg-success">Trống</span>
@elseif($ban->trang_thai == 'da_dat')
<span class="badge bg-warning">Đã đặt</span>
@else
<span class="badge bg-danger">Đang phục vụ</span>
@endif
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
@endsection
