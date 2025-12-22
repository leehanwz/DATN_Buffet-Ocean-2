@extends('layouts.admins.layout-admin')

@section('title', 'Quản lý Voucher')

@section('content')
<main class="app-content">
    <div class="app-title d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fa fa-ticket-alt"></i> Quản lý Voucher</h1>
        <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tạo voucher mới
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- THÊM MỚI: BỘ LỌC TÌM KIẾM --}}
    <div class="tile mb-4">
        <form class="row" method="GET" action="{{ route('admin.voucher.index') }}">
            <div class="col-md-4">
                <label class="form-label">Tìm theo mã, mô tả</label>
                <input class="form-control" type="text" name="search" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Loại giảm</label>
                <select class="form-control" name="loai_giam">
                    <option value="">-- Tất cả --</option>
                    <option value="phan_tram" {{ request('loai_giam') == 'phan_tram' ? 'selected' : '' }}>Giảm theo %</option>
                    <option value="tien_mat" {{ request('loai_giam') == 'tien_mat' ? 'selected' : '' }}>Giảm tiền mặt</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Trạng thái</label>
                <select class="form-control" name="trang_thai">
                    <option value="">-- Tất cả --</option>
                    <option value="dang_ap_dung" {{ request('trang_thai') == 'dang_ap_dung' ? 'selected' : '' }}>Đang áp dụng</option>
                    <option value="ngung_ap_dung" {{ request('trang_thai') == 'ngung_ap_dung' ? 'selected' : '' }}>Ngừng áp dụng</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary me-2" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                <a href="{{ route('admin.voucher.index') }}" class="btn ml-2 btn-secondary"><i class="fa fa-refresh"></i></a>
            </div>
        </form>
    </div>
    {{-- KẾT THÚC BỘ LỌC --}}


    @if($vouchers->isEmpty())
    <div class="alert alert-info">Không tìm thấy voucher nào.</div>
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Mã voucher</th>
                    <th>Mô tả</th>
                    <th>Loại/Giá trị</th>
                    <th>SL/Đã dùng</th>
                    <th>Trạng thái</th>
                    <th>Ngày BĐ</th>
                    <th>Ngày KT</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                <tr>
                    <td><span class="badge bg-primary">{{ $voucher->ma_voucher }}</span></td>
                    <td class="text-start">{{ $voucher->mo_ta }}</td>
                    <td>
                        @if($voucher->loai_giam == 'phan_tram')
                            Giảm {{ $voucher->gia_tri }}%
                            <br><small>(Tối đa: {{ number_format($voucher->gia_tri_toi_da ?? 0) }}₫)</small>
                        @else
                            Giảm {{ number_format($voucher->gia_tri) }}₫
                        @endif
                    </td>
                    <td>{{ $voucher->so_luong }} / {{ $voucher->so_luong_da_dung }}</td>
                    <td>
                        @if($voucher->trang_thai == 'dang_ap_dung' && $voucher->ngay_ket_thuc >= now() && $voucher->so_luong > $voucher->so_luong_da_dung)
                            <span class="badge bg-success">Đang áp dụng</span>
                        @else
                            <span class="badge bg-secondary">Ngừng/Hết hạn/Hết SL</span>
                        @endif
                    </td>
                    <td>{{ $voucher->ngay_bat_dau->format('d/m/Y') }}</td>
                    <td>{{ $voucher->ngay_ket_thuc->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.voucher.edit', $voucher->id) }}" class="btn btn-warning btn-sm mb-1"
                            title="Sửa voucher">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.voucher.destroy', $voucher->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm mb-1"
                                title="Xóa voucher">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $vouchers->links() }}
    </div>
    @endif
</main>
@endsection