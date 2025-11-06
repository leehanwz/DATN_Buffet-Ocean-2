@extends('layouts.admins.layout-admin')

@section('title', 'Tạo Đơn Đặt Bàn Mới')

@section('content')
    <main class="app-content">
        
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dat-ban.index') }}">Quản lý Đặt Bàn</a></li>
                <li class="breadcrumb-item"><a href="#"><b>Tạo Đặt Bàn Mới</b></a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo Đơn Đặt Bàn Mới (Tại quầy)</h3>
                    <div class="tile-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                            </div>
                        @endif
                         @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form class="row" method="POST" action="{{ route('admin.dat-ban.store') }}">
                            @csrf
                            
                            {{-- THÔNG TIN KHÁCH HÀNG --}}
                            <div class="form-group col-md-3">
                                <label class="control-label">Tên Khách Hàng (*)</label>
                                <input class="form-control" type="text" name="ten_khach" value="{{ old('ten_khach') }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Số Điện Thoại (*)</label>
                                <input class="form-control" type="text" name="sdt_khach" value="{{ old('sdt_khach') }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Số Lượng Khách (*)</label>
                                <input class="form-control" type="number" name="so_khach" min="1" value="{{ old('so_khach', 1) }}" required>
                            </div>
                            
                            {{-- 💡 ĐÃ THÊM: Ô TIỀN CỌC --}}
                            <div class="form-group col-md-3">
                                <label class="control-label">Tiền Cọc (Nếu có)</label>
                                <input class="form-control" type="number" name="tien_coc" value="{{ old('tien_coc', 0) }}" min="0">
                            </div>

                            {{-- THÔNG TIN ĐẶT BÀN --}}
                            <div class="form-group col-md-4">
                                <label class="control-label">Giờ Khách Đến (*)</label>
                                <input class="form-control" type="datetime-local" name="gio_den" id="gio_den_input" value="{{ old('gio_den') }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Chọn Bàn (*)</label>
                                <select class="form-control" name="ban_id" id="ban_id_select" required>
                                    <option value="">-- Vui lòng chọn Giờ đến trước --</option>
                                    @if(old('ban_id'))
                                        <option value="{{ old('ban_id') }}" selected>(Đã chọn Bàn {{ old('ban_id') }})</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Chọn Combo (Nếu có)</label>
                                <select class="form-control" name="combo_id">
                                    <option value="">-- Không chọn combo --</option>
                                     @foreach ($combos as $combo)
                                        <option value="{{ $combo->id }}" {{ old('combo_id') == $combo->id ? 'selected' : '' }}>
                                            {{ $combo->ten_combo }} ({{ number_format($combo->gia_co_ban) }} đ)
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Ghi Chú (Nếu có)</label>
                                <textarea class="form-control" name="ghi_chu" rows="3">{{ old('ghi_chu') }}</textarea>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <button class="btn btn-save" type="submit">Lưu Đặt Bàn</button>
                                <a class="btn btn-cancel" href="{{ route('admin.dat-ban.index') }}">Hủy bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
{{-- (Giữ nguyên code AJAX lọc bàn) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const timeInput = document.getElementById('gio_den_input');
        const tableSelect = document.getElementById('ban_id_select');
        const oldBanId = "{{ old('ban_id') }}";

        function updateAvailableTables() {
            const selectedTime = timeInput.value;
            if (!selectedTime) {
                tableSelect.innerHTML = '<option value="">-- Vui lòng chọn Giờ đến trước --</option>';
                return;
            }
            tableSelect.innerHTML = '<option value="">Đang tải danh sách bàn...</option>';
            tableSelect.disabled = true;
            // 💡 Sửa: Đảm bảo route AJAX đúng
            const url = `{{ route('admin.ajax.get-available-tables') }}?time=${selectedTime}`;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    tableSelect.innerHTML = ''; 
                    tableSelect.disabled = false;
                    if (data.length === 0) {
                        tableSelect.innerHTML = '<option value="">Không có bàn trống vào giờ này</option>';
                    } else {
                         tableSelect.innerHTML = '<option value="">-- Chọn bàn --</option>';
                        data.forEach(ban => {
                            const option = document.createElement('option');
                            option.value = ban.id;
                            option.textContent = `${ban.so_ban} (${ban.so_ghe} ghế)`;
                            if (oldBanId && ban.id == oldBanId) {
                                option.selected = true;
                            }
                            tableSelect.appendChild(option);
                        });
                    }
                    if (oldBanId && !tableSelect.querySelector(`option[value="${oldBanId}"]`)) {
                        const oldOption = document.createElement('option');
                        oldOption.value = oldBanId;
                        oldOption.textContent = `(Đã chọn Bàn ${oldBanId} - BỊ TRÙNG)`;
                        oldOption.selected = true;
                        oldOption.style.color = 'red';
                        tableSelect.appendChild(oldOption);
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi tải bàn:', error);
                    tableSelect.innerHTML = '<option value="">Lỗi khi tải danh sách bàn</option>';
                    tableSelect.disabled = false;
                });
        }
        timeInput.addEventListener('change', updateAvailableTables);
        if (timeInput.value) {
            updateAvailableTables();
        }
    });
</script>
@endsection