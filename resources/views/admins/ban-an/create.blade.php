@extends('layouts.admins.layout-admin')

@section('title', 'Tạo Bàn Ăn Mới')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.khu-vuc-ban-an') }}">Quản lý Khu Vực & Bàn Ăn</a></li>
            <li class="breadcrumb-item"><a href="#"><b>Tạo Bàn Ăn Mới</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo Bàn Ăn Mới</h3>
                <div class="tile-body">
                    {{-- Hiển thị lỗi Validation nếu có --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- Hiển thị lỗi DB nếu có --}}
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form class="row" method="POST" action="{{ route('admin.ban-an.store') }}">
                        @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label">Khu Vực (*)</label>
                            <select class="form-control" name="khu_vuc_id" required>
                                <option value="">-- Chọn Khu Vực --</option>
                                @foreach ($khuVucs as $kv)
                                <option value="{{ $kv->id }}" {{ old('khu_vuc_id') == $kv->id ? 'selected' : '' }}>
                                    {{ $kv->ten_khu_vuc }} (Tầng {{ $kv->tang }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Số Bàn (*)</label>
                            <input class="form-control" type="text" name="so_ban" value="{{ old('so_ban') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Số Ghế (*)</label>
                            <input class="form-control" type="number" name="so_ghe" min="1"
                                value="{{ old('so_ghe', 2) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Trạng Thái Mặc Định (*)</label>
                            <select class="form-control" name="trang_thai" required>
                                <option value="trong" {{ old('trang_thai', 'trong') == 'trong' ? 'selected' : '' }}>
                                    Trống</option>
                                <option value="khong_su_dung"
                                    {{ old('trang_thai') == 'khong_su_dung' ? 'selected' : '' }}>Không sử dụng</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-save" type="submit">Lưu lại</button>
                            <a class="btn btn-cancel" href="{{ route('admin.khu-vuc-ban-an') }}">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
@endsection