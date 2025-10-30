@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món trong combo')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý combo</li>
            <li class="breadcrumb-item"><a href="#">Danh sách món trong combo</a></li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Danh sách món trong combo</h3>

        <div class="mb-3 text-end">
            <a href="{{ route('admin.mon-trong-combo.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Thêm món vào combo
            </a>
        </div>

        <div class="tile-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Combo</th>
                        <th>Món ăn</th>
                        <th>Giới hạn số lượng</th>
                        <th>Phụ phí gọi thêm</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($monTrongCombos as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->combo->ten_combo ?? 'N/A' }}</td>
                        <td>{{ $item->monAn->ten_mon ?? 'N/A' }}</td>
                        <td>{{ $item->gioi_han_so_luong ?? 'Không giới hạn' }}</td>
                        <td>{{ number_format($item->phu_phi_goi_them, 0, ',', '.') }} đ</td>
                        <td>
                            @if($item->trang_thai == 1)
                            <span class="badge bg-success">Hoạt động</span>
                            @else
                            <span class="badge bg-danger">Ngừng</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.mon-trong-combo.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.mon-trong-combo.destroy', $item->id) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
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
                        <td colspan="9" class="text-center">Chưa có món trong combo nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection