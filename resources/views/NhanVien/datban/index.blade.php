@extends('layouts.Shop.layout-nhanvien')
@section('title','Đặt Bàn')

@section('content')
<div class="d-flex mb-3">
    <h4 class="me-auto">Danh sách đặt bàn</h4>
    <a href="{{ route('NhanVien.datban.create') }}" class="btn btn-primary">Tạo đặt bàn</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bàn</th>
                    <th>Khách</th>
                    <th>Số lượng</th>
                    <th>Thời gian</th>
                    <th>Nhân viên</th>
                    <th>Combo</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ds as $d)
                <tr>
                    <td>#{{ $d->id }} - {{ $d->ma_dat_ban }}</td>
                    <td>{{ $d->banAn? $d->banAn->so_ban : '-' }}</td>
                    <td>{{ $d->ten_khach }}</td>
                    <td>{{ $d->so_khach }}</td>
                    <td>{{ $d->gio_den }}</td>
                    <td>{{ $d->nhanVien ? $d->nhanVien->ho_ten : '-' }}</td>
                    <td>
                        @if($d->comboBuffet)
                        {{ $d->comboBuffet->ten_combo }} ({{ $d->comboBuffet->thoi_luong_phut }} phút)
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $d->trang_thai }}</td>
                    <td>
                        @if($d->trang_thai == 'cho_xac_nhan')
                        <form class="d-inline" method="post" action="{{ route('NhanVien.datban.xacnhan',$d->id) }}">
                            @csrf
                            <button class="btn btn-sm btn-success">Xác nhận</button>
                        </form>
                        <form class="d-inline" method="post" action="{{ route('NhanVien.datban.huy',$d->id) }}">
                            @csrf
                            <button class="btn btn-sm btn-danger">Hủy</button>
                        </form>
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
