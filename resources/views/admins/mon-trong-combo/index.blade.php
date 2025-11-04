@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món trong combo')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Quản lý combo</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.mon-trong-combo.index') }}">Danh sách món
                        trong combo</a></li>
                </ul>
            <div id="clock"></div>
            </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="tile-title">Danh sách món trong combo</h3>
                <a href="{{ route('admin.mon-trong-combo.create') }}" class="btn btn-add btn-sm">
                    <i class="fas fa-plus me-2"></i> Thêm món vào combo
                    </a>
                </div>

            <div class="tile-body">
                <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                    <form action="{{ route('admin.mon-trong-combo.index') }}" method="GET"
                        class="row g-3 align-items-end">

                        <div class="col-md-5">
                            <label for="filter_combo" class="form-label fw-semibold mb-1">Lọc theo Combo</label>
                            <select name="combo_id" id="filter_combo" class="form-control select2bs4">
                                <option value="">— Tất cả Combo —</option>
                                @foreach ($combos as $combo)
                                    <option value="{{ $combo->id }}"
                                        {{ request('combo_id') == $combo->id ? 'selected' : '' }}>
                                        {{ $combo->ten_combo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="filter_mon_an" class="form-label fw-semibold mb-1">Lọc theo Món Ăn</label>
                            <select name="mon_an_id" id="filter_mon_an" class="form-control select2bs4">
                                <option value="">— Tất cả Món Ăn —</option>
                                @foreach ($monAns as $mon)
                                    <option value="{{ $mon->id }}"
                                        {{ request('mon_an_id') == $mon->id ? 'selected' : '' }}>
                                        {{ $mon->ten_mon }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 d-flex align-self-end">
                            <button type="submit" class="btn btn-primary w-100" title="Tìm kiếm và Lọc">
                                <i class="fas fa-filter me-1"></i> Lọc
                            </button>
                        </div>
                    </form>
                </div>
                <div class="rounded overflow-hidden">
                    <table class="table table-bordered table-hover align-middle text-center mb-0"
                        id="monTrongComboTable">
                        <thead style="background-color: #002b5b; color: white;">
                            <tr>
                                <th>ID</th>
                                <th>Combo</th>
                                <th>Món ăn</th>
                                <th>Giới hạn số lượng</th>
                                <th>Phụ phí gọi thêm</th>
                                <th>Trạng thái</th>
                                <th style="width: 130px;">Ngày tạo</th>
                                <th style="width: 130px;">Ngày cập nhật</th>
                                <th style="width: 100px;">Hành động</th>
                                </tr>
                            </thead>
                        <tbody class="text-center">
                            @forelse($monTrongCombos as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="text-start">
                                        <span class="badge badge-primary">
                                            {{ $item->combo->ten_combo ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="text-start">
                                        <span class="fw-bold">{{ $item->monAn->ten_mon ?? 'N/A' }}</span>
                                    </td>

                                    <td>{{ $item->gioi_han_so_luong ?? 'Không giới hạn' }}</td>
                                    <td>
                                        {{ number_format($item->phu_phi_goi_them ?? 0, 0, ',', '.') }} đ</td>

                                    <td>
                                        <span class="badge bg-success">Hoạt động</span>
                                    </td>

                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>

                                    <td>
                                        <a
                                            href="{{ route('admin.mon-trong-combo.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                            </a>

                                        <form
                                            action="{{ route('admin.mon-trong-combo.destroy', $item->id) }}" method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('Bạn có chắc muốn xóa?');">
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
                                    <td colspan="9" class="text-center">Chưa có món trong
                                        combo nào</td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                
            </div>
            </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Khởi tạo Select2 cho các ô lọc
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $('#monTrongComboTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Vietnamese.json"
                },
                "responsive": true,
                "autoWidth": false,
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
@endpush
