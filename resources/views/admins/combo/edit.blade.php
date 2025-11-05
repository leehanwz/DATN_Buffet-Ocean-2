@extends('layouts.admins.layout-admin')

@section('title', 'Sửa Combo Buffet')

@section('content')
<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Quản lý combo</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.combo-buffet.index') }}">Danh sách combo</a></li>
        <li class="breadcrumb-item">Sửa combo</li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Sửa Combo Buffet: {{ $combo->ten_combo }}</h3>
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

            <form class="row" action="{{ route('admin.combo-buffet.update', $combo->id) }}" method="POST">
              @csrf
              @method('PUT')
              
              <div class="form-group col-md-6">
                <label class="control-label">Tên combo <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ten_combo" 
                       value="{{ old('ten_combo', $combo->ten_combo) }}" required>
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Giá cơ bản <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="gia_co_ban" 
                       value="{{ old('gia_co_ban', $combo->gia_co_ban) }}" required>
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Loại combo</label>
                <div class="d-block mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="loai_combo" id="loai_nl" value="nguoi_lon" 
                                {{ old('loai_combo', $combo->loai_combo) == 'nguoi_lon' ? 'checked' : '' }}>
                        <label class="form-check-label" for="loai_nl">Người lớn</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="loai_combo" id="loai_te" value="tre_em" 
                                {{ old('loai_combo', $combo->loai_combo) == 'tre_em' ? 'checked' : '' }}>
                        <label class="form-check-label" for="loai_te">Trẻ em</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="loai_combo" id="loai_vip" value="vip" 
                                {{ old('loai_combo', $combo->loai_combo) == 'vip' ? 'checked' : '' }}>
                        <label class="form-check-label" for="loai_vip">VIP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="loai_combo" id="loai_km" value="khuyen_mai" 
                                {{ old('loai_combo', $combo->loai_combo) == 'khuyen_mai' ? 'checked' : '' }}>
                        <label class="form-check-label" for="loai_km">Khuyến mãi</label>
                    </div>
                </div>
              </div>
              
              <div class="form-group col-md-6">
                <label class="control-label">Thời lượng (phút)</label>
                <input class="form-control" type="number" name="thoi_luong_phut" 
                       value="{{ old('thoi_luong_phut', $combo->thoi_luong_phut) }}">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Thời gian bắt đầu</label>
                @php
                    $start_time = $combo->thoi_gian_bat_dau ? \Carbon\Carbon::parse($combo->thoi_gian_bat_dau)->format('Y-m-d\TH:i') : '';
                @endphp
                <input class="form-control" type="datetime-local" name="thoi_gian_bat_dau" 
                       value="{{ old('thoi_gian_bat_dau', $start_time) }}">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Thời gian kết thúc</label>
                @php
                    $end_time = $combo->thoi_gian_ket_thuc ? \Carbon\Carbon::parse($combo->thoi_gian_ket_thuc)->format('Y-m-d\TH:i') : '';
                @endphp
                <input class="form-control" type="datetime-local" name="thoi_gian_ket_thuc" 
                       value="{{ old('thoi_gian_ket_thuc', $end_time) }}">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Trạng thái <span class="text-danger">*</span></label>
                <div class="d-block mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="trang_thai" id="tt_db" value="dang_ban" 
                                {{ old('trang_thai', $combo->trang_thai) == 'dang_ban' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tt_db">Đang bán</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="trang_thai" id="tt_nb" value="ngung_ban" 
                                {{ old('trang_thai', $combo->trang_thai) == 'ngung_ban' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tt_nb">Ngừng bán</label>
                    </div>
                </div>
              </div>

              <div class="form-group col-md-12 tile-footer">
                <button class="btn btn-save" type="submit">
                    <i class="fas fa-save me-2"></i> Lưu lại
                </button>
                <a class="btn btn-cancel" href="{{ route('admin.combo-buffet.index') }}">
                    <i class="fas fa-arrow-left me-2"></i> Hủy bỏ
                </a>
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