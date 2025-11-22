@extends('layouts.Shop.layout-nhanvien')
@section('title','Đặt Bàn')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Danh sách đặt bàn</h4>
    <a href="{{ route('NhanVien.datban.create') }}" class="btn btn-primary">Tạo đặt bàn</a>
</div>

{{-- Form lọc --}}
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-2">
                <label class="form-label fw-bold">Mã Đặt bàn</label>
                <input type="text" name="ma_dat_ban" class="form-control" placeholder="Nhập mã" value="{{ request('ma_dat_ban') }}">
            </div>
            <div class="col-md-1">
                <label class="form-label fw-bold">Bàn</label>
                <input type="text" name="ban" class="form-control" placeholder="Số bàn" value="{{ request('ban') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Khách</label>
                <input type="text" name="ten_khach" class="form-control" placeholder="Tên khách" value="{{ request('ten_khach') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Nhân viên</label>
                <input type="text" name="nhan_vien" class="form-control" placeholder="Tên NV" value="{{ request('nhan_vien') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Combo</label>
                <input type="text" name="combo" class="form-control" placeholder="Tên combo" value="{{ request('combo') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Trạng thái</label>
                <select name="trang_thai" class="form-select">
                    <option value="">Tất cả</option>
                    <option value="cho_xac_nhan" {{ request('trang_thai')=='cho_xac_nhan'?'selected':'' }}>Chờ xác nhận</option>
                    <option value="da_xac_nhan" {{ request('trang_thai')=='da_xac_nhan'?'selected':'' }}>Đã xác nhận</option>
                    <option value="khach_da_den" {{ request('trang_thai')=='khach_da_den'?'selected':'' }}>Khách đã đến</option>
                    <option value="huy" {{ request('trang_thai')=='huy'?'selected':'' }}>Hủy</option>
                </select>
            </div>

        </form>
        <div class="col-md-2 d-flex gap-2">
    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
        <i class="bi bi-search me-1"></i> Lọc
    </button>
    <a href="{{ route('NhanVien.datban.index') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-clockwise me-1"></i> Reset
    </a>
</div>
    </div>
</div>

{{-- Table --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>Stt</th>
                        <th>Mã Đặt bàn</th>
                        <th>Bàn</th>
                        <th>Khách</th>
                        <th>Số lượng</th>
                        <th>Thời gian đặt</th>
                        <th>Nhân viên</th>
                        <th>Combo</th>
                        <th>Ghi chú</th>
                        <th>Thời gian còn lại</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ds as $index => $d)
                    <tr class="{{ $d->trang_thai=='huy'?'table-danger':'' }}">
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $d->ma_dat_ban }}</td>
                        <td class="text-center">{{ $d->banAn? $d->banAn->so_ban:'-' }}</td>
                        <td>{{ $d->ten_khach }}</td>
                        <td class="text-center">{{ $d->so_khach }}</td>
                        <td>{{ $d->gio_den? \Carbon\Carbon::parse($d->gio_den)->format('H:i d-m-Y'):'-' }}</td>
                        <td>{{ $d->nhanVien? $d->nhanVien->ho_ten:'-' }}</td>
                        <td>{{ $d->comboBuffet? $d->comboBuffet->ten_combo.' ('.$d->comboBuffet->thoi_luong_phut.' phút)':'-' }}</td>
                        <td>{{ $d->ghi_chu ?? '-' }}</td>
                        <td class="text-center">
                            @if(in_array($d->trang_thai,['da_xac_nhan','khach_da_den']) && $d->gio_xac_nhan)
                            <span class="countdown fw-bold"
                                data-start="{{ $d->gio_xac_nhan->timezone(config('app.timezone'))->timestamp * 1000 }}"
                                data-minutes="{{ $d->thoi_luong_phut ?? 120 }}">
                                {{ $d->thoiGianConLai }}
                            </span>
                            @elseif($d->trang_thai=='cho_xac_nhan')
                            <span class="text-muted">Chưa xác nhận</span>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @php
                            $statusLabels = [
                            'cho_xac_nhan'=>'Chờ xác nhận',
                            'da_xac_nhan'=>'Đã xác nhận',
                            'khach_da_den'=>'Khách đã đến',
                            'huy'=>'Hủy'
                            ];
                            @endphp
                            <span class="badge bg-{{ $d->trang_thai=='huy'?'danger':($d->trang_thai=='da_xac_nhan'?'success':'warning') }}">
                                {{ $statusLabels[$d->trang_thai] ?? $d->trang_thai }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if($d->trang_thai=='cho_xac_nhan')
                            <form class="d-inline" method="post" action="{{ route('NhanVien.datban.xacnhan',$d->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-success" title="Xác nhận">✅</button>
                            </form>
                            <form class="d-inline" method="post" action="{{ route('NhanVien.datban.huy',$d->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-danger" title="Hủy">❌</button>
                            </form>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateCountdown() {
        document.querySelectorAll('.countdown').forEach(el => {
            let start = new Date(parseInt(el.dataset.start));
            let minutes = parseInt(el.dataset.minutes);
            let end = new Date(start.getTime() + minutes * 60 * 1000);
            let now = new Date();
            let diffMs = end - now;

            if (diffMs <= 0) {
                el.innerText = 'Đã hết giờ';
                el.classList.add('text-danger');
            } else {
                let h = Math.floor(diffMs / (1000 * 60 * 60));
                let m = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
                let s = Math.floor((diffMs % (1000 * 60)) / 1000);
                el.innerText = `${h} giờ ${m} phút ${s} giây`;
            }
        });
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
@endpush
@endsection
