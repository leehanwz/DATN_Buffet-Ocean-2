@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món ăn')

@section('content')
<div class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách món ăn</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    {{-- Thông báo --}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    {{-- Các nút thao tác --}}
                    <div class="row element-button mb-3">
                        <div class="col-sm-2">
                            <a href="{{ route('admin.mon-an.create') }}" class="btn btn-add btn-sm">
                                <i class="fas fa-plus"></i> Thêm món ăn
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm nhap-tu-file" title="Nhập file" onclick="myFunction(this)">
                                <i class="fas fa-file-upload"></i> Tải từ file
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm print-file" onclick="myApp.printTable()">
                                <i class="fas fa-print"></i> In dữ liệu
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm js-textareacopybtn">
                                <i class="fas fa-copy"></i> Sao chép
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-excel btn-sm" href="#">
                                <i class="fas fa-file-excel"></i> Xuất Excel
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm pdf-file" onclick="myFunction(this)">
                                <i class="fas fa-file-pdf"></i> Xuất PDF
                            </a>
                        </div>
                    </div>

                    {{-- Bảng dữ liệu --}}
                    <table class="table table-bordered table-hover" id="sampleTable">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Tên món</th>
                                <th>Danh mục</th>
                                <th>Loại món</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dsMonAn as $index => $monAn)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $monAn->ten_mon }}</strong><br>
                                    @if($monAn->mo_ta)
                                    <small class="text-muted fst-italic">{{ Str::limit($monAn->mo_ta, 50) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($monAn->danhMuc)
                                    <span class="badge bg-success">{{ $monAn->danhMuc->ten_danh_muc }}</span>
                                    @else
                                    <span class="badge bg-secondary">Không có</span>
                                    @endif
                                </td>

                                <td>
                                    @if($monAn->loai_mon)
                                    <span class="badge bg-info text-dark">{{ $monAn->loai_mon }}</span>
                                    @else
                                    <span class="badge bg-secondary">Không phân loại</span>
                                    @endif
                                </td>
                                <td class="text-danger fw-semibold">{{ number_format($monAn->gia, 0, ',', '.') }}₫</td>
                                <td>
                                    @if($monAn->hinh_anh)
                                    <img src="{{ asset($monAn->hinh_anh) }}" alt="Ảnh món" width="60" height="60" class="rounded-circle border">
                                    @else
                                    <span class="text-muted fst-italic">Không có ảnh</span>
                                    @endif
                                </td>
                                <td>{{ $monAn->thoi_gian_che_bien }} phút</td>
                                <td>
                                    @php
                                    $trangThai = [
                                    'con' => ['Còn món', 'badge bg-warning text-dark'],
                                    'het' => ['Hết món', 'badge bg-danger'],
                                    'an' => ['Ẩn', 'badge bg-secondary'],
                                    ];
                                    $status = $trangThai[$monAn->trang_thai] ?? ['Không rõ', 'badge bg-light'];
                                    @endphp
                                    <span class="{{ $status[1] }}">{{ $status[0] }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.mon-an.show', $monAn->id) }}" class="btn btn-sm btn-info">
                                        <i class='bx bx-show'></i>
                                    </a>
                                    <a href="{{ route('admin.mon-an.edit', $monAn->id) }}" class="btn btn-sm btn-warning">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                    <form action="{{ route('admin.mon-an.destroy', $monAn->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xóa món ăn này?')">
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
                                <td colspan="9" class="text-center text-muted">Chưa có món ăn nào</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Phân trang --}}
                    <div class="d-flex justify-content-center">
                        {{ $dsMonAn->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
