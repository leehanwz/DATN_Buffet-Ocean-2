@extends('layouts.admins.layout-admin')

@section('title', 'Dashboard')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active"><b>Quản lý nhân viên</b></li>
        </ul>
        <div id="clock"></div>
    </div>

    {{-- THÔNG BÁO --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- FORM TÌM KIẾM + LỌC --}}
    <div class="tile">
        <form method="GET" action="{{ route('admin.nhan-vien.index') }}" class="row mb-3">
            <div class="col-md-3">
                <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control"
                       placeholder="Tìm theo tên, email, SĐT...">
            </div>
            <div class="col-md-3">
                <select name="vai_tro" class="form-control">
                    <option value="">-- Vai trò --</option>
                    <option value="quan_ly" {{ request('vai_tro') == 'quan_ly' ? 'selected' : '' }}>Quản lý</option>
                    <option value="bep" {{ request('vai_tro') == 'bep' ? 'selected' : '' }}>Bếp</option>
                    <option value="phuc_vu" {{ request('vai_tro') == 'phuc_vu' ? 'selected' : '' }}>Phục vụ</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="trang_thai" class="form-control">
                    <option value="">-- Trạng thái --</option>
                    <option value="dang_lam" {{ request('trang_thai') == 'dang_lam' ? 'selected' : '' }}>Đang Làm</option>
                    <option value="nghi" {{ request('trang_thai') == 'nghi' ? 'selected' : '' }}>Nghỉ </option>
                    <option value="khoa" {{ request('trang_thai') == 'khoa' ? 'selected' : '' }}>Khoá</option>
                </select>
                
            </div>
            <div class="col-md-3 d-flex">
                <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-search"></i> Tìm kiếm</button>
                <a href="{{ route('admin.nhan-vien.index') }}" class="btn btn-secondary"><i class="fa fa-refresh"></i> Reset</a>
            </div>
        </form>

        {{-- NÚT THÊM MỚI --}}
        <div class="mb-3">
            <a href="{{ route('admin.nhan-vien.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Thêm nhân viên
            </a>
        </div>

        {{-- BẢNG DANH SÁCH --}}
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr class="text-center">
                        <th width="5%">STT</th>
                        <th>Họ tên</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th width="18%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nhanViens as $index => $nv)
                        <tr class="text-center">
                            <td>{{ $nhanViens->firstItem() + $index }}</td>
                            <td>{{ $nv->ho_ten }}</td>
                            <td>{{ $nv->sdt }}</td>
                            <td>{{ $nv->email }}</td>
                            <td>
                                @if($nv->vai_tro == 'quan_ly')
                                    <span class="badge badge-primary">Quản lý</span>
                                @elseif($nv->vai_tro == 'bep')
                                    <span class="badge badge-warning">Bếp</span>
                                @else
                                    <span class="badge badge-info">Phục vụ</span>
                                @endif
                            </td>
                            <td>
                                @if($nv->trang_thai == 'dang_lam')
                                    <span class="badge badge-success">Đang làm</span>
                                @elseif($nv->trang_thai == 'nghi')
                                    <span class="badge badge-danger">Nghỉ</span>
                                @else
                                    <span class="badge badge-secondary">Khoá</span>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{ route('admin.nhan-vien.edit', $nv->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.nhan-vien.destroy', $nv->id) }}" method="POST" style="display:inline-block;"
                                      onsubmit="return confirm('Xóa nhân viên này?');">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                {{-- Cập nhật trạng thái --}}
                                <form action="{{ route('admin.nhan-vien.cap-nhat-trang-thai', $nv->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    @if($nv->trang_thai == 'hoat_dong')
                                        <button class="btn btn-sm btn-warning">Khoá</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có nhân viên nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PHÂN TRANG --}}
            <div class="d-flex justify-content-end">
                {{ $nhanViens->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
