@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món ăn')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Danh sách món ăn</h3>
        <a href="{{ route('admin.mon-an.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Thêm món ăn
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tên món</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Thời gian chế biến</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dsMonAn as $index => $monAn)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $monAn->ten_mon }}</td>
                        <td>{{ $monAn->danhMuc->ten_danh_muc ?? '-' }}</td>
                        <td>{{ number_format($monAn->gia,0,',','.') }}₫</td>
                        <td>
                            @if($monAn->hinh_anh)
                                <img src="{{ asset($monAn->hinh_anh) }}" width="70" height="70" class="rounded">
                            @else
                                <span class="text-muted">Không có ảnh</span>
                            @endif
                        </td>
                        <td>{{ $monAn->thoi_gian_che_bien }} phút</td>
                        <td>
                            <span class="badge {{ $monAn->trang_thai ? 'bg-success' : 'bg-secondary' }}">
                                {{ $monAn->trang_thai ? 'Hiển thị' : 'Ẩn' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.mon-an.show', $monAn->id) }}" class="btn btn-sm btn-info"><i class='bx bx-show'></i></a>
                            <a href="{{ route('admin.mon-an.edit', $monAn->id) }}" class="btn btn-sm btn-warning"><i class='bx bx-edit'></i></a>
                            <form action="{{ route('admin.mon-an.destroy', $monAn->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa món ăn này?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class='bx bx-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Chưa có món ăn nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $dsMonAn->links() }}</div>
        </div>
    </div>
</div>
@endsection
