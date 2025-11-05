@extends('layouts.admins.layout-admin')

@section('title', 'Combo Buffet')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="{{ route('admin.combo-buffet.index') }}"><b>Combo
                            Buffet</b></a></li>
                </ul>
            <div id="clock"></div>
            </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="tile-title">Danh sách Combo Buffet</h3>
                        <a class="btn btn-add btn-sm" href="{{ route('admin.combo-buffet.create') }}" title="Thêm">
                            <i class="fas fa-plus"></i> Thêm combo mới
                        </a>
                    </div>

                    <div class="tile-body">
                        <div class="rounded overflow-hidden">
                            <table
                                class="table table-hover table-bordered align-middle text-center mb-0" id="sampleTable">
                                <thead style="background-color: #002b5b; color: white;">
                                    <tr>
                                        <th>ID</th>
                                        <th class="text-start">Tên Combo</th>
                                        <th>Loại</th>
                                        <th>Giá cơ bản</th>
                                        <th>Thời lượng(phút)</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 100px;">Hành động</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @forelse($combos as $combo)
                                        <tr>
                                            <td>{{ $combo->id }}</td>
                                            <td class="text-start">
                                                {{ $combo->ten_combo }}</td>
                                            <td>
                                                <span class="badge {{ $combo->loai_combo_badge }}">
                                                    {{ $combo->loai_combo_display }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                {{ number_format($combo->gia_co_ban, 0, ',', '.') }} đ</td>
                                            <td>{{ $combo->thoi_luong_phut }}</td>
                                            <td>{{ $combo->start_time_display }}
                                            </td>
                                            <td>{{ $combo->end_time_display }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $combo->trang_thai_badge }}">
                                                    
                                                    {{ $combo->trang_thai_display }}
                                                    </span>
                                                </td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.combo-buffet.edit', $combo->id) }}"
                                                    class="btn btn-warning btn-sm" title="Sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form
                                                    action="{{ route('admin.combo-buffet.destroy', $combo->id) }}"
                                                    method="POST" class="d-inline-block"
                                                    onsubmit="return confirm('Xác nhận xóa combo này')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm" title="Xóa">
                                                        <i
                                                            class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted py-4">Chưa có combo nào.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                
                            </table>
                        </div>
                        
                    </div>
                    
                </div>
                </div>
            </div>
        
    </main>
@endsection

@section('script')
    
    <script>
        oTable = $('#sampleTable').dataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Vietnamese.json"
            },
            "order": [
                [1, "asc"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": 0
            }]
        });

        $('#all').click(function(e) {
            $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
            e.stopImmediatePropagation();
        });
    </script>
@endsection
