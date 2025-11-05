@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách danh mục')

@section('content')
<main class="app-content">

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="{{ route('admin.danh-muc.index') }}"><b>Danh sách danh mục</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">Danh sách danh mục</h3>
                    <a href="{{ route('admin.danh-muc.create') }}" class="btn btn-add btn-sm">
                        <i class="fas fa-plus me-2"></i> Thêm danh mục
                    </a>
                </div>

                <div class="tile-body">
                    
                    <div class="rounded overflow-hidden">
                        <table class="table table-bordered table-hover align-middle text-center mb-0" id="danhMucTable">
                            
                            <thead style="background-color: #002b5b; color: white;">
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th style="width: 120px;">Hiển thị</th>
                                    <th style="width: 100px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($danhMucs as $index => $dm)
                                <tr>
                                    <td>{{ $danhMucs->firstItem() + $index }}</td>
                                    <td class="text-start">{{ $dm->ten_danh_muc }}</td>
                                    <td class="text-start">{{ $dm->mo_ta ?? '—' }}</td>
                                    <td>
                                        <span class="badge {{ $dm->hien_thi_badge }}">
                                            {{ $dm->hien_thi_display }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.danh-muc.edit', $dm->id) }}" class="btn btn-sm btn-warning" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.danh-muc.destroy', $dm->id) }}" method="POST" class="d-inline-block"
                                            onsubmit="return confirm('Xác nhận xóa danh mục này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Xóa">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Chưa có danh mục nào</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $danhMucs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection