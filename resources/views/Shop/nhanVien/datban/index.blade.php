@extends('layouts.Shop.layout-nhanvien')
@section('title','Đặt Bàn')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Danh sách đặt bàn</h4>
    <a href="{{ route('NhanVien.datban.create') }}" class="btn btn-primary">Tạo đặt bàn</a>
</div>

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

                        <td class="text-center td-countdown" data-id="{{ $d->id }}" data-minutes="{{ $d->comboBuffet ? $d->comboBuffet->thoi_luong_phut : 120 }}">
                            @if($d->trang_thai == 'khach_da_den')
                            <span class="countdown-text">Đang tải...</span>
                            @else
                            -
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
                            <span id="badge-{{ $d->id }}" class="badge {{ $d->trang_thai=='huy'?'bg-danger':($d->trang_thai=='da_xac_nhan'?'bg-success':'bg-warning') }}">
                                {{ $statusLabels[$d->trang_thai] ?? $d->trang_thai }}
                            </span>
                        </td>

                        <td class="text-center">
                            @if($d->trang_thai == 'cho_xac_nhan')
                            <form method="post" action="{{ route('NhanVien.datban.thaydoitrangthai', $d->id) }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="trang_thai" value="da_xac_nhan">
                                <button type="submit" class="btn btn-sm btn-success">✅</button>
                            </form>
                            <form method="post" action="{{ route('NhanVien.datban.thaydoitrangthai', $d->id) }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="trang_thai" value="huy">
                                <button type="submit" class="btn btn-sm btn-danger">❌</button>
                            </form>
                            @elseif($d->trang_thai == 'da_xac_nhan')
                            <button type="button"
                                class="btn btn-sm btn-primary btn-khach-da-den"
                                data-id="{{ $d->id }}"
                                data-minutes="{{ $d->comboBuffet ? $d->comboBuffet->thoi_luong_phut : 120 }}">
                                👤 Khách đã đến
                            </button>
                            @elseif($d->trang_thai == 'khach_da_den')
                            <span class="text-success">Khách đã đến</span>
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
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const timers = {};

    function startCountdown(td, minutes, startTime) {
        let countdownSpan = td.querySelector('.countdown-text');
        if (!countdownSpan) {
            countdownSpan = document.createElement('span');
            countdownSpan.classList.add('countdown-text');
            td.innerHTML = '';
            td.appendChild(countdownSpan);
        }

        if (timers[td.dataset.id]) clearInterval(timers[td.dataset.id]);

        const endTime = startTime + minutes * 60 * 1000;

        timers[td.dataset.id] = setInterval(() => {
            const now = Date.now();
            let diffMs = endTime - now;

            if (diffMs <= 0) {
                countdownSpan.textContent = 'ĐÃ HẾT GIỜ';
                td.classList.add('text-danger');
                clearInterval(timers[td.dataset.id]);
                localStorage.removeItem('datban_' + td.dataset.id);
                return;
            }

            const totalSec = Math.floor(diffMs / 1000);
            const h = Math.floor(totalSec / 3600);
            const m = Math.floor((totalSec % 3600) / 60);
            const s = totalSec % 60;
            countdownSpan.textContent = `${h} giờ ${m} phút ${s} giây`;
        }, 1000);
    }

    // Xử lý nút "Khách đã đến"
document.querySelectorAll('.btn-khach-da-den').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.dataset.id;

        fetch(`/Nhan-Vien/dat-ban/${id}/khach-da-den-ajax`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
        .then(res => res.json())
        .then(res => {
            if(res.success){
                // reload trang để load badge, màu, countdown từ server
                location.reload();
            } else {
                alert('Cập nhật thất bại');
            }
        });
    });
});
    // Khi load trang, khởi countdown cho các bàn đã có trạng thái "Khách đã đến"
    document.querySelectorAll('tr').forEach(tr => {
        const badge = tr.querySelector('span[id^="badge-"]');
        if(!badge) return;
        if(badge.textContent.trim() !== 'Khách đã đến') return;

        const td = tr.querySelector('.td-countdown');
        const id = td.dataset.id;
        const minutes = parseInt(td.dataset.minutes) || 120;

        let startTime = localStorage.getItem('datban_' + id);
        if(!startTime){
            startTime = Date.now();
            localStorage.setItem('datban_' + id, startTime);
        } else {
            startTime = parseInt(startTime);
        }

        startCountdown(td, minutes, startTime);
    });
});
</script>
@endpush
