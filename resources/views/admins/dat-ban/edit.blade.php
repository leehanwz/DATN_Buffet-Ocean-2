@extends('layouts.admins.layout-admin')

@section('title', 'Sửa đặt bàn')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý đặt bàn</li>
            <li class="breadcrumb-item active"><a href="#">Sửa đặt bàn</a></li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Cập nhật thông tin đặt bàn</h3>

        <div class="tile-body">
            <form action="{{ route('admin.dat-ban.update', $datBan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tên khách</label>
                        <input type="text" name="ten_khach" class="form-control"
                               value="{{ old('ten_khach', $datBan->ten_khach) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="sdt_khach" class="form-control"
                               value="{{ old('sdt_khach', $datBan->sdt_khach) }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Số khách</label>
                        <input type="number" name="so_khach" class="form-control" min="1"
                               value="{{ old('so_khach', $datBan->so_khach) }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Bàn</label>
                        <select name="ban_id" class="form-select" required>
                            <option value="">-- Chọn bàn --</option>
                            @foreach($dsBan ?? [] as $ban)
                                <option value="{{ $ban->id }}"
                                    {{ $datBan->ban_id == $ban->id ? 'selected' : '' }}>
                                    {{ $ban->ten_ban ?? 'Bàn '.$ban->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="trang_thai" class="form-select" required>
                            @php
                                $trangThaiList = [
                                    'cho_xac_nhan' => 'Chờ xác nhận',
                                    'da_xac_nhan' => 'Đã xác nhận',
                                    'khach_da_den' => 'Khách đã đến',
                                    'hoan_tat' => 'Hoàn tất',
                                    'huy' => 'Hủy',
                                ];
                            @endphp
                            @foreach($trangThaiList as $key => $label)
                                <option value="{{ $key }}" {{ $datBan->trang_thai == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Giờ đến</label>
                        <input type="datetime-local" name="gio_den" class="form-control"
                               value="{{ old('gio_den', $datBan->gio_den ? \Carbon\Carbon::parse($datBan->gio_den)->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tiền cọc</label>
                        <input type="number" step="0.01" name="tien_coc" class="form-control"
                               value="{{ old('tien_coc', $datBan->tien_coc) }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Ghi chú</label>
                        <textarea name="ghi_chu" rows="3" class="form-control">{{ old('ghi_chu', $datBan->ghi_chu) }}</textarea>
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.dat-ban.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
