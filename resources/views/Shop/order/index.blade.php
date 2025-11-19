@extends('nhanvien.layout')


@if(!$order)
<form method="post" action="{{ route('nhanvien.order.open', $ban->id) }}">@csrf
<button class="btn btn-success">Mở order</button>
<a href="{{ route('nhanvien.ban.index') }}" class="btn btn-outline-secondary">Quay lại</a>
</form>
@else
<div class="mb-3">
<h6>Danh sách món gọi</h6>
<table class="table table-sm">
<thead>
<tr><th>Mon</th><th>SL</th><th>Ghi chú</th><th></th></tr>
</thead>
<tbody id="order-items">
@foreach($order->chiTietOrders as $it)
<tr data-id="{{ $it->id }}">
<td>{{ $it->monAn? $it->monAn->ten_mon : '-' }}</td>
<td>{{ $it->so_luong }}</td>
<td>{{ $it->ghi_chu }}</td>
<td>
<button class="btn btn-sm btn-danger btn-delete-item" data-id="{{ $it->id }}">X</button>
</td>
</tr>
@endforeach
</tbody>
</table>


<form id="sendKitchenForm" method="post" action="{{ route('nhanvien.order.sendkitchen', $order->id) }}">@csrf
<button class="btn btn-warning">Gửi bếp</button>
</form>
</div>
@endif


</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-body">
<h5>Thực đơn</h5>
<div class="row row-cols-2 g-2 menu-grid">
@foreach($monAn as $m)
<div class="col">
<div class="card p-2 mon-card" data-id="{{ $m->id }}" data-name="{{ $m->ten_mon }}" data-price="{{ $m->gia ?? 0 }}">
<div class="d-flex justify-content-between align-items-center">
<div>
<strong>{{ $m->ten_mon }}</strong>
<div class="small text-muted">{{ $m->mo_ta ?? '' }}</div>
</div>
<div>
<button class="btn btn-sm btn-primary btn-add" data-id="{{ $m->id }}">Thêm</button>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
@end



