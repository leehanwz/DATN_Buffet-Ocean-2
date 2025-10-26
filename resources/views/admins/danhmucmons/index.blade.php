@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh mục món</b></a></li>
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
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a href="{{ route('admin.danhmucmons.create') }}" class="btn btn-add btn-sm" title="Thêm"><i class="fas fa-plus"></i>Tạo mới sản phẩm</a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="nhập" onclick="myFunction(this)">
                                <i class="fas fa-file-upload">Tải từ file</i>
                            </a>
                        </div>

                        <div class="col-sm-2">
                            <a href="" class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()">
                                <i class="fas fa-print"> In dữ liệu</i>
                            </a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                    class="fas fa-copy"></i> Sao chép</a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                    class="fas fa-file-pdf"></i> Xuất PDF</a>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <table class="table table-bordered table-hover" id="sampleTable">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Hiển thị</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($danhMucs as $index => $dm)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dm->ten_danh_muc }}</td>
                                    <td>{{ $dm->mo_ta ?? '-' }}</td>
                                    <td>
                                        <span class="badge {{ $dm->hien_thi ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $dm->hien_thi ? 'Hiển thị' : 'Ẩn' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.danhmucmons.edit', $dm->id) }}" class="btn btn-sm btn-warning">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <form action="{{ route('admin.danhmucmons.destroy', $dm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa danh mục này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class='bx bx-trash'></i>
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

                        <div class="d-flex justify-content-center">
                            {{ $danhMucs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection