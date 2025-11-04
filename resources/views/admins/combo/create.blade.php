@extends('layouts.admins.layout-admin')

@section('title', 'Thêm Combo Buffet')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.combo-buffet.index') }}">Danh sách combo</a></li>
                <li class="breadcrumb-item"><a href="#">Thêm combo</a></li>
                </ul>
            <div id="clock"></div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo mới Combo Buffet</h3>
                    <div class="tile-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif

                        <!-- SỬA LỖI ROUTE: Thêm 'admin.' -->
                        <form action="{{ route('admin.combo-buffet.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Tên combo <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="ten_combo"
                                        value="{{ old('ten_combo') }}" required>
                                    </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Giá cơ bản <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="gia_co_ban"
                                        value="{{ old('gia_co_ban') }}" required>
                                    </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Thời lượng (phút)</label>
                                    <input class="form-control" type="number" name="thoi_luong_phut"
                                        value="{{ old('thoi_luong_phut') }}">
                                    </div>

                                <!-- SỬA LỖI LOGIC: Dùng Radio Button và đúng giá trị DB -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">Loại combo</label>
                                    <div class="d-block mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loai_combo" id="loai_nl"
                                                value="nguoi_lon" {{ old('loai_combo') == 'nguoi_lon' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="loai_nl">Người lớn</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loai_combo" id="loai_te"
                                                value="tre_em" {{ old('loai_combo') == 'tre_em' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="loai_te">Trẻ em</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loai_combo" id="loai_vip"
                                                value="vip" {{ old('loai_combo') == 'vip' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="loai_vip">VIP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loai_combo" id="loai_km"
                                                value="khuyen_mai" {{ old('loai_combo') == 'khuyen_mai' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="loai_km">Khuyến mãi</label>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Thời gian bắt đầu</label>
                                    <input class="form-control" type="datetime-local"
                                        name="thoi_gian_bat_dau" value="{{ old('thoi_gian_bat_dau') }}">
                                    </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Thời gian kết thúc</label>
                                    <input class="form-control" type="datetime-local"
                                        name="thoi_gian_ket_thuc" value="{{ old('thoi_gian_ket_thuc') }}">
                                    </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Trạng thái <span
                                            class="text-danger">*</span></label>
                                    <!-- SỬA LỖI LOGIC: Dùng Radio Button và đúng giá trị DB -->
                                    <div class="d-block mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="tt_db"
                                                value="dang_ban"
                                                {{ old('trang_thai', 'dang_ban') == 'dang_ban' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tt_db">Đang bán</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai"
                                                id="tt_nb" value="ngung_ban"
                                                {{ old('trang_thai') == 'ngung_ban' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tt_nb">Ngừng bán</label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-add" type="submit">
                                    <i class="fas fa-plus-circle me-2"></i>Lưu lại
                                </button>
                                <a class="btn btn-secondary"
                                    href="{{ route('admin.combo-buffet.index') }}">
                                    <i class="fas fa-arrow-left me-2"></i>Hủy bỏ
                                </a>
                                </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
