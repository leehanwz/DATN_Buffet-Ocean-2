<tbody>
@forelse($ds as $index => $d)
<tr style="{{ $d->trang_thai == 'huy' ? 'opacity: 0.6;' : '' }}">
    <td class="text-center text-muted fw-bold">{{ $index + 1 }}</td>
    <td class="text-center font-heading text-primary fw-bold">{{ $d->ma_dat_ban }}</td>
    <td class="text-center">
        @if ($d->banAn)
        <span class="tag-table">Bàn {{ $d->banAn->so_ban }}</span>
        <div class="small text-muted mt-1" style="font-size: 0.7rem;">{{ $d->banAn->khuVuc->ten_khu_vuc ?? '' }}</div>
        @else
        <span class="text-muted small fst-italic">Chưa xếp</span>
        @endif
    </td>
    <td>
        <div class="fw-bold text-dark">{{ $d->ten_khach }}</div>
        <div class="small text-muted"><i class="fa-solid fa-phone me-1" style="font-size: 0.7rem;"></i>{{ $d->sdt_khach }}</div>
    </td>
    <td>{{ $d->nguoi_lon }}</td>
    <td>{{ $d->tre_em }}</td>
    <td class="text-center small">
        @if($d->gio_den)
        <div class="fw-bold">{{ \Carbon\Carbon::parse($d->gio_den)->format('H:i') }}</div>
        <div class="text-muted">{{ \Carbon\Carbon::parse($d->gio_den)->format('d/m') }}</div>
        @else - @endif
    </td>
    <td>
        @if ($d->comboBuffet)
        <span class="fw-bold text-dark">{{ $d->comboBuffet->ten_combo }}</span>
        <span class="text-muted small">({{ $d->thoi_luong_phut ?? $d->comboBuffet->thoi_luong_phut }}p)</span>
        @else
        <span class="text-muted small fst-italic">Chưa chọn</span>
        @endif
    </td>
    <td class="text-center small">
        @if ($d->trang_thai == 'khach_da_den' && $d->comboBuffet)
        @php
        $orderDau = \App\Models\OrderMon::where('dat_ban_id', $d->id)->orderBy('created_at', 'asc')->first();
        $thoiLuong = $d->comboBuffet->thoi_luong_phut ?? 120;
        $endTime = $orderDau ? \Carbon\Carbon::parse($orderDau->created_at)->addMinutes($thoiLuong)->timestamp * 1000 : null;
        @endphp
        @if ($endTime)
        <span class="countdown-timer text-primary" data-endtime="{{ $endTime }}">...</span>
        @else
        <span class="text-muted">Chưa gọi món</span>
        @endif
        @elseif(in_array($d->trang_thai, ['cho_xac_nhan', 'da_xac_nhan']))
        <span class="text-muted">Chưa đến</span>
        @else
        -
        @endif
    </td>
    <td class="text-center">
        @php
        $st = $d->trang_thai;
        $badgeClass = 'bg-secondary text-white';
        $badgeText = $st;
        if($st == 'cho_xac_nhan') { $badgeClass = 'st-cho'; $badgeText = 'Chờ duyệt'; }
        elseif($st == 'da_xac_nhan') { $badgeClass = 'st-xac-nhan'; $badgeText = 'Đã duyệt'; }
        elseif($st == 'khach_da_den') { $badgeClass = 'st-phuc-vu'; $badgeText = 'Đang ăn'; }
        elseif($st == 'hoan_tat') { $badgeClass = 'st-hoan-tat'; $badgeText = 'Hoàn tất'; }
        elseif($st == 'huy') { $badgeClass = 'st-huy'; $badgeText = 'Hủy'; }
        @endphp
        <span class="badge-pill {{ $badgeClass }}">{{ $badgeText }}</span>
    </td>
    <td class="text-center">
        {{-- Bạn giữ nguyên phần action buttons --}}
        ...
    </td>
</tr>
@empty
<tr>
    <td colspan="10" class="text-center py-5 text-muted">
        <i class="fa-solid fa-inbox fa-2x mb-2 opacity-25"></i>
        <p class="fw-bold mb-0">Không tìm thấy dữ liệu đặt bàn.</p>
    </td>
</tr>
@endforelse
</tbody>
