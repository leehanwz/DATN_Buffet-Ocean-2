@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Danh sách bàn')

@section('content')
<main class="app-content">
    @if(session('success'))
    <div class="alert alert-success text-center fw-semibold rounded-3 shadow-sm" id="flashMsg">
        {{ session('success') }}
    </div>
    @endif

    <div class="app-title d-flex justify-content-between align-items-center mb-4">
        <ul class="app-breadcrumb breadcrumb side mb-0">
            <li class="breadcrumb-item active">
                <h2 class="fw-bold">Danh sách bàn</h2>
            </li>
        </ul>
        <div id="clock" class="text-muted fw-semibold"></div>
    </div>

    <div class="row g-3">
        @foreach($bans as $ban)
        @php
        $order = $orders->has($ban->id) ? $orders[$ban->id] : null;
        @endphp

        <div class="col-md-2 col-sm-4 col-6">
            <div class="card shadow-sm rounded-4 border-0 position-relative overflow-hidden"
                style="cursor: pointer; transition: transform 0.2s;">

                {{-- Header trạng thái --}}
                <div class="p-3 text-white fw-bold rounded-top
                    @if($ban->trang_thai == 'dang_trong') bg-success
                    @elseif($ban->trang_thai == 'co_khach') bg-danger
                    @else bg-secondary @endif
                    text-center">
                    <h6 class="mb-1" style="color: red;">Bàn {{ $ban->so_ban }}</h6>
                    <small class="opacity-75">
                        @if($order)
                        Đang phục vụ
                        @else
                        Trống
                        @endif
                    </small>
                </div>

                {{-- Thân card --}}
                <div class="card-body text-center py-3">
                    @if($order)
                    <p class="mb-1"><i class="bi bi-receipt"></i> Order ID: <b>{{ $order->id }}</b></p>
                    <p class="mb-1"><i class="bi bi-basket3"></i> Tổng món: <b>{{ $order->tong_mon }}</b></p>
                    <p class="mb-2"><i class="bi bi-currency-dollar"></i> Tổng tiền: <b>{{ number_format($order->tong_tien) }} đ</b></p>

                    <a href="{{ route('nhanvien.order.page', $order->id) }}"
                        class="btn btn-warning btn-sm fw-semibold w-100 rounded-3 shadow-sm">
                        Chi tiết / Thêm món
                    </a>
                    @else
                    <p class="text-muted mb-3"><i class="bi bi-clock-history"></i> Chưa có order</p>

                    <form action="{{ route('nhanvien.order.mo-order') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ban_id" value="{{ $ban->id }}">
                        <button class="btn btn-outline-primary btn-sm fw-semibold w-100 rounded-3 shadow-sm">
                            Mở Order
                        </button>
                    </form>
                    @endif
                </div>

            </div>
        </div>
        @endforeach
    </div>
</main>

{{-- Hover effect --}}
<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(255, 0, 191, 0.15);
    }

    #flashMsg {
        animation: fadeOut 5s forwards;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>
@endsection
