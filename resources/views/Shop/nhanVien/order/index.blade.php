@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Danh sách bàn')

@section('content')
<main class="app-content">
    <div class="container-xxl px-4">

        {{-- Mini Dashboard --}}
        <div class="row mb-4 g-3">
            @php
            $dashboardItems = [
            ['label'=>'Tổng số bàn', 'count'=>$bans->count(), 'bg'=>'#28a74533', 'icon'=>'bi-grid-3x3-gap'],
            ['label'=>'Bàn trống', 'count'=>$bans->where('trang_thai', 'trong')->count(), 'bg'=>'#6c757d33', 'icon'=>'bi-person-check'],
            ['label'=>'Đang phục vụ', 'count'=>$bans->where('trang_thai', 'dang_phuc_vu')->count(), 'bg'=>'#dc354533', 'icon'=>'bi-people-fill'],
            ['label'=>'Khách đến & chưa chọn combo', 'count'=>$bans->filter(function($ban) use ($orders) {
            $datBanMoiNhat = \App\Models\DatBan::where('ban_id', $ban->id)->latest()->first();
            return $datBanMoiNhat && $datBanMoiNhat->trang_thai == 'khach_da_den' && !$orders->has($ban->id);
            })->count(), 'bg'=>'#17a2b833', 'icon'=>'bi-person-plus'],
            ['label'=>'Bàn bảo trì', 'count'=>$bans->where('trang_thai', 'khong_su_dung')->count(), 'bg'=>'#6c757d88', 'icon'=>'bi-tools']
            ];
            @endphp

            @foreach($dashboardItems as $item)
            <div class="col d-flex">
                <div class="p-3 rounded-4 shadow-sm text-center flex-fill" style="background: {{ $item['bg'] }}">
                    <h5 class="fw-bold mb-1">
                        <i class="bi {{ $item['icon'] }}"></i> {{ $item['count'] }}
                    </h5>
                    <small>{{ $item['label'] }}</small>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Phân khu vực --}}
        @foreach($khuVucs as $khu)
        <div class="mb-4">
            <h4 class="fw-bold mb-3">
                <i class="bi bi-building me-2"></i> {{ $khu->ten_khu_vuc }} (Tầng {{ $khu->tang }})
            </h4>
            <div class="row g-3 justify-content-start">
                @foreach($bans->where('khu_vuc_id', $khu->id) as $ban)
                @php
                $order = $orders->has($ban->id) ? $orders[$ban->id] : null;
                $datBanMoiNhat = \App\Models\DatBan::where('ban_id', $ban->id)->latest()->first();
                if($ban->trang_thai == 'trong') {
                $bgHeader = 'linear-gradient(135deg, #28a745, #7be495)';
                $icon='bi-person-check';
                } elseif($ban->trang_thai == 'dang_phuc_vu') {
                $bgHeader='linear-gradient(135deg, #dc3545, #ff6b6b)';
                $icon='bi-people-fill';
                } elseif($ban->trang_thai == 'khong_su_dung') {
                $bgHeader='linear-gradient(135deg, #6c757d, #adb5bd)'; // xám
                $icon='bi-slash-circle';
                } else {
                $bgHeader='linear-gradient(135deg, #ffc107, #ffe58a)';
                $icon='bi-tools';
                }

                @endphp

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                    <div class="card table-card shadow-sm rounded-4 border-0 position-relative overflow-hidden flex-fill d-flex flex-column">
                        <div class="table-card-header text-center text-white fw-bold py-2 rounded-top"
                            style="background: {{ $bgHeader }};">
                            <h5 class="mb-1"><i class="bi {{ $icon }}"></i> Bàn {{ $ban->so_ban }}</h5>
                            <div class="mt-2 w-100 text-center">
                                @php
                                if($ban->trang_thai == 'khong_su_dung') {
                                $trangThaiText = 'Bảo trì';
                                $trangThaiClass = 'bg-dark text-white';
                                } elseif(isset($datBanMoiNhat)) {
                                switch($datBanMoiNhat->trang_thai) {
                                case 'da_xac_nhan':
                                $trangThaiText='Đã đặt';
                                $trangThaiClass='bg-warning text-dark';
                                break;
                                case 'khach_da_den':
                                $trangThaiText = $order ? 'Đang phục vụ':'Khách đã đến';
                                $trangThaiClass = $order ? 'bg-success text-white':'bg-info text-white';
                                break;
                                default:
                                $trangThaiText = 'Trống';
                                $trangThaiClass = 'bg-secondary';
                                break;
                                }
                                } else {
                                $trangThaiText = 'Trống';
                                $trangThaiClass = 'bg-secondary';
                                }
                                @endphp
                                <span class="badge {{ $trangThaiClass }}">{{ $trangThaiText }}</span>

                            </div>
                        </div>

                        <div class="card-body d-flex flex-column align-items-center justify-content-center p-3">
                            @if($order)
                            <p class="mb-1 text-truncate"><i class="bi bi-receipt"></i> <b>Order: {{ $order->id }}</b></p>
                            @if($order->datBan)
                            <p class="mb-1"><i class="bi bi-person-fill"></i> {{ $order->datBan->ten_khach }}</p>
                            <p class="mb-1"><i class="bi bi-telephone-fill"></i> {{ $order->datBan->sdt_khach }}</p>
                            @endif
                            <p class="mb-1"><i class="bi bi-basket3"></i> {{ $order->tong_mon }} món</p>
                            <p class="mb-2"><i class="bi bi-currency-dollar"></i> {{ number_format($order->tong_tien) }} đ</p>

                            <a href="{{ route('nhanVien.order.page', $order->id) }}"
                                class="btn btn-warning btn-lg rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                style="width:50px; height:50px; padding:0;">
                                <i class="bi bi-card-checklist fs-5"></i>
                            </a>
                            @else
                            <form action="{{ route('nhanVien.order.mo-order') }}" method="POST" class="w-100 d-flex justify-content-center">
                                @csrf
                                <input type="hidden" name="ban_id" value="{{ $ban->id }}">
                                <button type="submit"
                                    class="btn btn-success btn-lg rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                    style="width:50px; height:50px;">
                                    <i class="bi bi-plus-circle fs-5"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
</main>

<style>
    .table-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .table-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .table-card-header .badge {
        font-size: 0.75rem;
        padding: 0.25em 0.6em;
        border-radius: 12px;
    }

    .card-body p {
        font-size: 0.85rem;
        margin-bottom: 0.25rem;
    }

    .card-body .btn {
        transition: all 0.2s;
    }

    .card-body .btn:hover {
        transform: scale(1.1);
    }

    .row.mb-4 > .col {
        flex: 1;
        min-width: 0;
    }

    /* Responsive 6 cột */
    @media (max-width: 1200px) {
        .col-xl-2 {
            flex: 0 0 16.666667%;
            max-width: 16.666667%;
        }
    }

    @media (max-width: 992px) {
        .col-lg-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }

    @media (max-width: 768px) {
        .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
    }

    @media (max-width: 576px) {
        .col-sm-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
</style>

@endsection
