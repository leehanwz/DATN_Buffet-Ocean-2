@extends('layouts.admins.layout-admin')

@section('title', 'Danh sách bàn')

@section('content')
<main class="app-content">
    @if(session('success'))
    <div class="alert alert-success text-center fw-semibold rounded-3 shadow-sm" id="flashMsg">
        {{ session('success') }}
    </div>
    @endif

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><b>Danh sách bàn</b></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        @foreach($bans as $index => $ban)
        @php
        $order = $orders->has($ban->id) ? $orders[$ban->id] : null;
        @endphp

        <div class="col-md-2 mb-3">
            <div class="card text-center cursor-pointer"
                id="ban-{{ $ban->id }}"
                style="cursor: pointer;"
                data-ban-id="{{ $ban->id }}"
                data-order-id="{{ $order?->id ?? '' }}"
                onclick="moOrder(this)">

                <div class="card-body
                @if($ban->trang_thai == 'dang_trong') bg-success text-white
                @elseif($ban->trang_thai == 'co_khach') bg-danger text-white
                @else bg-secondary text-white @endif">

                    <h5 class="card-title">Bàn {{ $ban->so_ban }}</h5>
                    <p class="card-text">
                        @if($order)
                        Order ID: {{ $order->id }} <br>
                        Tổng món: {{ $order->tong_mon }} <br>
                        Tổng tiền: {{ number_format($order->tong_tien) }}
                        @else
                        Trống
                        @endif
                    </p>

                    <div class="d-flex gap-2 justify-content-center mt-2">
                        @if(!$order)
                        <!-- Nút mở order -->
                        <button class="btn btn-light btn-sm"
                            onclick="moOrder(this.closest('.card'))">
                            Mở Order
                        </button>
                        <!-- Nút chi tiết vô hiệu -->
                        <button class="btn btn-secondary btn-sm" disabled>Chi tiết</button>
                        @else
                        <!-- Khi đã có order thì chỉ hiển thị nút chi tiết với orderId -->
                        <a href="{{ route('nhanvien.chi-tiet-order.show', ['orderId' => $order->id]) }}"
                            class="btn btn-warning btn-sm">
                            Chi tiết
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</main>
@endsection

@section('scripts')
<script>
    function cardClick(el) {
        // Nếu bàn đã có order, redirect sang chi tiết luôn
        const orderId = el.dataset.orderId;
        const banId = el.dataset.banId;

        if (orderId) {
            window.location.href = '/nhanvien/chi-tiet-order?order_id=' + orderId;
        }
    }

    function moOrder(el, event) {
        event.stopPropagation(); // tránh click lên card

        const banId = el.dataset.banId || el.getAttribute('data-ban-id');
        const orderId = el.dataset.orderId || el.getAttribute('data-order-id');

        fetch("{{ route('nhanvien.order.mo-order') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    ban_id: banId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // redirect sang chi tiết order
                    window.location.href = '/nhanvien/chi-tiet-order?order_id=' + data.order.id;
                } else {
                    alert('Mở order thất bại!');
                }
            })
            .catch(err => {
                console.error('AJAX lỗi:', err);
                alert('Có lỗi xảy ra. Kiểm tra console.');
            });
    }
</script>
@endsection