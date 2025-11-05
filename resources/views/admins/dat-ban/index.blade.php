@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách Đặt Bàn')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý Đặt Bàn</li>
            <li class="breadcrumb-item"><a href="#">Danh sách Đặt Bàn</a></li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Danh sách Đặt Bàn</h3>

        <div class="mb-3 text-end">
            <a href="{{ route('admin.dat-ban.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tạo Đặt Bàn mới
            </a>
        </div>

        <div class="tile-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Mã đặt bàn</th>
                        <th>Tên khách</th>
                        <th>SĐT</th>
                        <th>Số khách</th>
                        <th>Bàn</th>
                        <th>Giờ đến</th>
                        <th>Tiền cọc</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($dsDatBan as $ban)
                    <tr>
                        <td>{{ $ban->ma_dat_ban }}</td>
                        <td>{{ $ban->ten_khach }}</td>
                        <td>{{ $ban->sdt_khach }}</td>
                        <td>{{ $ban->so_khach }}</td>
                        <td>{{ $ban->banAn->so_ban ?? 'Chưa gán' }}</td>
                        <td>{{ $ban->gio_den ? date('d/m/Y H:i', strtotime($ban->gio_den)) : '—' }}</td>
                        <td>{{ number_format($ban->tien_coc, 0, ',', '.') }} đ</td>
                        <td>
                            @switch($ban->trang_thai)
                                @case('cho_xac_nhan')
                                    <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                                    @break
                                @case('da_xac_nhan')
                                    <span class="badge bg-info">Đã xác nhận</span>
                                    @break
                                @case('khach_da_den')
                                    <span class="badge bg-primary">Khách đã đến</span>
                                    @break
                                @case('hoan_tat')
                                    <span class="badge bg-success">Hoàn tất</span>
                                    @break
                                @case('huy')
                                    <span class="badge bg-danger">Đã hủy</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">{{ $ban->trang_thai }}</span>
                            @endswitch
                        </td>
                        <td>{{ $ban->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.dat-ban.edit', $ban->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.dat-ban.destroy', $ban->id) }}" method="POST" style="display:inline-block;"
                                onsubmit="return confirm('Bạn có chắc muốn xóa đặt bàn này?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Chưa có đặt bàn nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $dsDatBan->links() }}
        </div>
    </div>
</main>
@endsection
