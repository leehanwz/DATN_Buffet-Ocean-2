@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Thêm món vào Order')

@section('content')
<main class="app-content">

    <h3>Thêm món vào Order #{{ $order->id }}</h3>
    <p><b>Bàn:</b> {{ $order->banAn->so_ban ?? 'Không xác định' }}</p>

    <hr>

    <div class="container d-flex flex-wrap gap-4">
        {{-- Danh sách món ăn --}}
        <div id="menu-container" class="flex-grow-1" style="min-width: 600px;">
            @foreach($monAns as $mon)
            <div class="card mb-3 d-flex flex-row align-items-center p-2 mon-card"
                data-id="{{ $mon->id }}"
                data-ten="{{ $mon->ten_mon }}"
                data-gia="{{ $mon->gia }}"
                data-loai="{{ $mon->loai_mon }}">
                <img src="{{ asset($mon->hinh_anh ?? 'https://placehold.co/60x60') }}"
                    alt="{{ $mon->ten_mon }}" class="me-3" style="width:60px;height:60px;object-fit:cover;border-radius:8px;">
                <div class="flex-grow-1">
                    <strong>{{ $mon->ten_mon }}</strong> <br>
                    Giá: {{ number_format($mon->gia,0,',','.') }}đ <br>
                    Loại: {{ $mon->loai_mon }}
                </div>
                <button class="btn btn-primary btn-sm add-to-cart">Thêm</button>
            </div>
            @endforeach
        </div>


        {{-- Giỏ hàng --}}
        <aside style="width: 320px;">
            <div class="card p-3 shadow-sm">
                <h5>Giỏ hàng</h5>
                <ul id="cart-items" class="list-unstyled"></ul>
                <button id="submit-order-btn" class="btn btn-success w-100 mt-2">Gửi Order</button>
            </div>
        </aside>
    </div>

</main>

<script>
    const orderId = {{ $order -> id }};
    //lỗi thì thay lại thành hàng ngang như dưới là chạy được:
    //const orderId = {{ $order -> id }};
    let cart = [];

    function renderCart() {
        const ul = document.getElementById('cart-items');
        ul.innerHTML = '';
        cart.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = "d-flex justify-content-between align-items-center mb-2";
            li.innerHTML = `
                <div>
                    ${item.ten_mon} (x${item.so_luong}) <small>(${item.loai_mon})</small>
                    ${item.ghi_chu ? `<br><small class="text-muted">Ghi chú: ${item.ghi_chu}</small>` : ''}
                </div>
                <div>
                    <button class="btn btn-sm btn-secondary me-1" onclick="editNote(${index})">✎</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteItem(${index})">x</button>
                </div>
            `;
            ul.appendChild(li);
        });
    }

    function addToCart(monId, tenMon, gia, loaiMon) {
        // Kiểm tra xem món đã có trong giỏ hàng chưa, nếu có thì tăng số lượng
        const existing = cart.find(i => i.mon_an_id == monId);
        if (existing) {
            existing.so_luong++;
        } else {
            cart.push({
                mon_an_id: monId,
                ten_mon: tenMon,
                so_luong: 1,
                ghi_chu: null,
                loai_mon: loaiMon
            });
        }
        renderCart();
    }

    function deleteItem(index) {
        if (confirm(`Bạn có chắc muốn xóa món ${cart[index].ten_mon}?`)) {
            cart.splice(index, 1);
            renderCart();
        }
    }

    function editNote(index) {
        const note = prompt(`Nhập ghi chú cho ${cart[index].ten_mon}:`, cart[index].ghi_chu || '');
        if (note !== null) {
            cart[index].ghi_chu = note.trim();
            renderCart();
        }
    }

    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', e => {
            const card = e.target.closest('.mon-card');
            addToCart(
                card.dataset.id,
                card.dataset.ten,
                card.dataset.gia,
                card.dataset.loai
            );
        });
    });

    document.getElementById('submit-order-btn').addEventListener('click', async () => {
    if (cart.length === 0) return alert('Chọn món trước khi gửi!');

    try {
        const res = await fetch("{{ route('nhanvien.chi-tiet-order.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                order_id: {{ $order->id }},
                // lỗi thì thay lại thành hàng ngang như dưới là chạy được:
                // order_id: {{ $order->id }},
                items: cart
            })
        });

        const data = await res.json(); // ✅ bây giờ parse được
        if (!data.success) throw new Error(data.message || 'Lỗi khi gửi order');

        alert(data.message);
        // window.location.href = "{{ route('nhanvien.chi-tiet-order.show', $order->id) }}";
        const referrer = document.referrer || "{{ route('nhanvien.order.index') }}";
            window.location.href = referrer;
    } catch (err) {
        alert(err.message);
    }
});

</script>

<style>
    .mon-card {
        cursor: pointer;
        transition: 0.2s;
    }

    .mon-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
