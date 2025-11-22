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

                        <td class="text-center td-countdown"
                            data-id="{{ $d->id }}"
                            data-minutes="{{ $d->comboBuffet ? $d->comboBuffet->thoi_luong_phut : 120 }}">
                            @if($d->trang_thai == 'khach_da_den')
                            {{ $d->comboBuffet ? $d->comboBuffet->thoi_luong_phut : 120 }} phút
                            @else
                            -
                            @endif
                        </td>
                        {{-- Trạng thái --}}
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

                        {{-- Hành động --}}
                        <td class="text-center">
                            @if($d->trang_thai == 'cho_xac_nhan')
                            <form method="post" action="{{ route('NhanVien.datban.thaydoitrangthai', $d->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">✅</button>
                            </form>
                            <form method="post" action="{{ route('NhanVien.datban.thaydoitrangthai', $d->id) }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="trang_thai" value="huy">
                                <button type="submit" class="btn btn-sm btn-danger">❌</button>
                            </form>

                            @elseif($d->trang_thai == 'da_xac_nhan')
                            <form class="form-khach-da-den" method="post" action="{{ route('NhanVien.datban.thaydoitrangthai', $d->id) }}">
                                @csrf
                                <button type="button" class="btn btn-sm btn-primary btn-khach-da-den"
                                    data-id="{{ $d->id }}">
                                    👤 Khách đã đến
                                </button>
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
@endsection

@push('scripts')
<script>
    function startCountdowns() {
        document.querySelectorAll('.td-countdown').forEach(td => {
            if (td.innerText.trim() === '-') return;

            let id = td.dataset.id;
            let minutes = parseInt(td.dataset.minutes) || 120;

            // Lấy start time từ localStorage, nếu chưa có thì đặt bây giờ
            let startTimestamp = localStorage.getItem('start_' + id);
            let start = startTimestamp ? new Date(parseInt(startTimestamp)) : new Date();
            if (!startTimestamp) localStorage.setItem('start_' + id, start.getTime());

            let alerted = false;

            const interval = setInterval(() => {
                let now = new Date();
                let end = new Date(start.getTime() + minutes * 60 * 1000);
                let diffMs = end - now;

                if (diffMs <= 0) {
                    td.innerText = 'Đã hết giờ';
                    td.classList.add('text-danger');

                    if (!alerted) {
                        let maDatBan = td.closest('tr').querySelector('td:nth-child(2)').innerText;
                        let soBan = td.closest('tr').querySelector('td:nth-child(3)').innerText;
                        alert(`Đặt bàn ${maDatBan} (Bàn ${soBan}) đã hết giờ!`);
                        alerted = true;
                        localStorage.removeItem('start_' + id);
                    }

                    clearInterval(interval); // dừng interval khi hết giờ
                } else {
                    let h = Math.floor(diffMs / (1000 * 60 * 60));
                    let m = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
                    let s = Math.floor((diffMs % (1000 * 60)) / 1000);
                    td.innerText = `${h} giờ ${m} phút ${s} giây`;
                }
            }, 1000);
        });
    }

    document.addEventListener('DOMContentLoaded', startCountdowns);
    document.querySelectorAll('.btn-khach-da-den').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('form').submit();
        });
    });
</script>
@endpush
