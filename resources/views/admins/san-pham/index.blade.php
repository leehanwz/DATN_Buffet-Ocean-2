@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách món ăn')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="#"><b>Danh sách món ăn</b></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    {{-- Form lọc & tìm kiếm --}}
                    <form method="GET" action="{{ route('admin.san-pham.index') }}" class="form-inline mb-3">
                        <input type="text" name="keyword" class="form-control mr-2" placeholder="Tìm theo tên món..." value="{{ request('keyword') }}">

                        <select name="danh_muc_id" class="form-control mr-2">
                            <option value="">-- Tất cả danh mục --</option>
                            @foreach($danhMucs as $dm)
                                <option value="{{ $dm->id }}" {{ request('danh_muc_id') == $dm->id ? 'selected' : '' }}>
                                    {{ $dm->ten_danh_muc }}
                                </option>
                            @endforeach
                        </select>

                        <select name="trang_thai" class="form-control mr-2">
                            <option value="">-- Tất cả trạng thái --</option>
                            <option value="con" {{ request('trang_thai') == 'con' ? 'selected' : '' }}>Còn món</option>
                            <option value="het" {{ request('trang_thai') == 'het' ? 'selected' : '' }}>Hết món</option>
                            <option value="an" {{ request('trang_thai') == 'an' ? 'selected' : '' }}>Ẩn</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </form>

                    {{-- Bảng danh sách món ăn --}}
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên món</th>
                                <th>Danh mục</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = ($monAn->currentPage() - 1) * $monAn->perPage() + 1;
                            @endphp
                            @foreach($monAn as $item)
                                <tr class="align-middle text-center">
                                    <td>{{ $stt++ }}</td>
                                    <td><img src="{{ $item->hinh_anh }}" alt="{{ $item->ten_mon }}" width="70" class="rounded"></td>
                                    <td>{{ $item->ten_mon }}</td>
                                    <td>{{ $item->danhMuc->ten_danh_muc ?? 'Không có' }}</td>
                                    <td>{{ number_format($item->gia, 0, ',', '.') }}đ</td>
                                    <td>
                                        {{-- Form đổi trạng thái --}}
                                        <form action="{{ route('admin.san-pham.trangthai', $item->id) }}" method="POST" class="d-flex justify-content-center align-items-center">
                                            @csrf
                                            <select name="trang_thai" class="form-control form-control-sm text-center"
                                                style="
                                                    width: 110px;
                                                    font-weight: 600;
                                                    color:
                                                        {{ $item->trang_thai == 'con' ? '#0c9b00' : ($item->trang_thai == 'het' ? '#e00000' : '#000') }};
                                                    border-color:
                                                        {{ $item->trang_thai == 'con' ? '#0c9b00' : ($item->trang_thai == 'het' ? '#e00000' : '#000') }};
                                                ">
                                                <option value="con" {{ $item->trang_thai == 'con' ? 'selected' : '' }}>Còn món</option>
                                                <option value="het" {{ $item->trang_thai == 'het' ? 'selected' : '' }}>Hết món</option>
                                                <option value="an" {{ $item->trang_thai == 'an' ? 'selected' : '' }}>Ẩn</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-outline-primary ml-2">Lưu</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="#" class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{-- Phân trang --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $monAn->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
