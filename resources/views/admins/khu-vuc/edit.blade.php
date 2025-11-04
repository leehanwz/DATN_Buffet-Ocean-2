@extends('layouts.admins.layout-admin')

@section('title', 'Sửa Khu Vực')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.khu-vuc-ban-an') }}">Quản lý Khu Vực & Bàn Ăn</a></li>
            <li class="breadcrumb-item"><a href="#"><b>Sửa Khu Vực</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Sửa Khu Vực: {{ $khuVuc->ten_khu_vuc }}</h3>
                <div class="tile-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form class="row" method="POST" action="{{ route('admin.khu-vuc.update', $khuVuc->id) }}">
                        @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên Khu Vực (*)</label>
                            <input class="form-control" type="text" name="ten_khu_vuc"
                                value="{{ old('ten_khu_vuc', $khuVuc->ten_khu_vuc) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Số Tầng (*)</label>
                            <input class="form-control" type="number" name="tang" min="1"
                                value="{{ old('tang', $khuVuc->tang) }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô Tả</label>
                            <textarea class="form-control" name="mo_ta">{{ old('mo_ta', $khuVuc->mo_ta) }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-save" type="submit">Cập nhật</button>
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