@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách bàn ăn')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý bàn ăn</li>
            <li class="breadcrumb-item"><a href="#">Danh sách bàn ăn</a></li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Danh sách bàn ăn</h3>

        <div class="row mb-3">
            <div class="col-md-6">
                <form method="GET" action="{{ route('admin.ban-an.index') }}" class="form-inline">
                    <input type="text" name="keyword" class="form-control mr-2"
                        placeholder="Tìm theo tên hoặc mã bàn..." value="{{ request('keyword') }}">

                    <select name="trang_thai" class="form-control mr-2">
                        <option value="">-- Trạng thái --</option>
                        <option value="trong" {{ request('trang_thai') == 'trong' ? 'selected' : '' }}>Trống</option>
                        <option value="co_khach" {{ request('trang_thai') == 'co_khach' ? 'selected' : '' }}>Có khách
                        </option>
                        <option value="dat_truoc" {{ request('trang_thai') == 'dat_truoc' ? 'selected' : '' }}>Đặt trước
                        </option>
                    </select>

                    <button class="btn btn-primary"><i class="fas fa-search"></i> Lọc</button>
                </form>
            </div>

            <div class="col-md-6 text-right">
                <a href="{{ route('admin.ban-an.create') }}" class="btn btn-add btn-sm">
                    <i class="fas fa-plus"></i> Thêm bàn ăn
                </a>
            </div>
        </div>

        <div class="tile-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Khu vực</th>
                        <th>Số bàn</th>
                        <th>Số ghế</th>
                        <th>Mã QR</th>
                        <th>Giờ bắt đầu</th>
                        <th>Trạng thái</th>
                        <th width="20%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banAns as $index => $banAn)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $banAn->khuVuc->ten_khu_vuc ?? '—' }}</td>
                        <td>{{ $banAn->so_ban }}</td>
                        <td>{{ $banAn->so_ghe }}</td>
                        <td>
                            @if ($banAn->duong_dan_qr)
                            <img src="{{ asset('storage/' . $banAn->duong_dan_qr) }}" alt="QR" width="50" height="50">
                            @else
                            <span>—</span>
                            @endif
                        </td>
                        <td>
                            @if ($banAn->gio_bat_dau)
                            {{ \Carbon\Carbon::parse($banAn->gio_bat_dau)->format('H:i d/m/Y') }}
                            @else
                            —
                            @endif
                        </td>
                        <td>
                            @if ($banAn->trang_thai == 'co_khach')
                            <span class="badge bg-success">Đang có khách</span>
                            @elseif ($banAn->trang_thai == 'dat_truoc')
                            <span class="badge bg-warning text-dark">Đặt trước</span>
                            @else
                            <span class="badge bg-secondary">Trống</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.ban-an.edit', $banAn->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.ban-an.destroy', $banAn->id) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('Bạn có chắc muốn xóa bàn này?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>

                            <form action="{{ route('admin.ban-an.cap-nhat-trang-thai', $banAn->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-info">
                                    <i class="fas fa-sync"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Chưa có bàn ăn nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection