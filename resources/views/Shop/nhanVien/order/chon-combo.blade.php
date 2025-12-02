@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Chọn Combo Buffet')

{{-- 1. IMPORT FONTS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

{{-- 2. CSS STYLING (Design System) --}}
<style>
    :root {
        --primary: #fea116;
        /* Cam vàng */
        --primary-dark: #d98a12;
        /* Cam đậm */
        --dark: #0f172b;
        /* Xanh đen */
        --white: #ffffff;
        --text-main: #1e293b;
        --text-sub: #64748b;
        --bg-light: #f8f9fa;

        --shadow-card: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
        --shadow-hover: 0 20px 40px -5px rgba(0, 0, 0, 0.1);
        --radius: 8px;
        --anim-fast: 0.2s ease;
    }

    body {
        font-family: 'Nunito', sans-serif;
        background-color: var(--bg-light);
        color: var(--text-main);
    }

    h2,
    h3,
    h4,
    h5,
    strong,
    .font-heading {
        font-family: 'Heebo', sans-serif;
    }

    /* --- HEADER SECTION --- */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-title {
        color: var(--dark);
        font-weight: 800;
        font-size: 1.8rem;
        text-transform: uppercase;
    }

    /* --- INFO BOX (Context Order) --- */
    .context-box {
        background: var(--white);
        border-radius: var(--radius);
        padding: 15px 20px;
        border-left: 4px solid var(--primary);
        box-shadow: var(--shadow-card);
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .context-item {
        display: flex;
        flex-direction: column;
    }

    .context-label {
        font-size: 0.75rem;
        color: var(--text-sub);
        font-weight: 700;
        text-transform: uppercase;
    }

    .context-value {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        font-family: 'Heebo';
    }

    /* --- COMBO CARD --- */
    .combo-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid #f1f5f9;
        box-shadow: var(--shadow-card);
        transition: var(--anim-fast);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .combo-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: rgba(254, 161, 22, 0.4);
    }

    /* Image Area */
    .img-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .combo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .combo-card:hover .combo-img {
        transform: scale(1.05);
    }

    .price-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(15, 23, 43, 0.9);
        /* Dark background */
        color: var(--primary);
        padding: 5px 12px;
        border-radius: 4px;
        font-family: 'Heebo';
        font-weight: 800;
        font-size: 1.1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    /* Card Body */
    .card-body-custom {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .combo-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
        font-family: 'Heebo';
        line-height: 1.2;
    }

    .combo-desc-label {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-sub);
        margin-bottom: 8px;
        display: block;
    }

    /* List Items */
    .menu-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
        flex: 1;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px dashed #f1f5f9;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .item-thumb {
        width: 40px;
        height: 40px;
        border-radius: 6px;
        object-fit: cover;
        border: 1px solid #e2e8f0;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .item-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-main);
        flex: 1;
    }

    .item-qty {
        background: #f1f5f9;
        color: var(--text-sub);
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    /* Button */
    .btn-select {
        width: 100%;
        border: none;
        padding: 12px;
        border-radius: 6px;
        font-weight: 800;
        text-transform: uppercase;
        font-family: 'Heebo', sans-serif;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--anim-fast);
        background: var(--primary);
        color: var(--white);
        box-shadow: 0 4px 10px rgba(254, 161, 22, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-select:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .btn-back {
        background: #e2e8f0;
        color: var(--text-sub);
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: 0.2s;
    }

    .btn-back:hover {
        background: #cbd5e1;
        color: var(--dark);
    }

    /* Button ± tròn */
    .btn-increase,
    .btn-decrease {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid #e2e8f0;
        background-color: #f8f9fa;
        font-weight: 800;
        font-size: 1.2rem;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-increase:hover,
    .btn-decrease:hover {
        background-color: var(--primary);
        color: var(--white);
        transform: scale(1.1);
    }

    /* Input số lượng */
    .combo-qty {
        text-align: center;
        font-weight: 700;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        transition: transform 0.15s ease;
    }

    /* Animation khi thay đổi số lượng */
    .combo-qty.animate {
        transform: scale(1.2);
    }

    .filter-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .filter-menu a {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid var(--primary);
        color: var(--primary);
        background: var(--white);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .filter-menu a:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-2px);
    }

    .filter-menu a.active {
        background: var(--primary);
        color: var(--white);
        box-shadow: 0 4px 12px rgba(254, 161, 22, 0.3);
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-content {
        background: #fff;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        position: relative;
        padding: 20px;
    }

    .modal-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .modal-img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .modal-title {
        font-weight: 800;
        font-size: 1.3rem;
        margin-bottom: 5px;
    }

    .modal-price {
        font-weight: 700;
        color: #fea116;
        margin-bottom: 10px;
    }

    .modal-desc {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 10px;
    }

    .modal-qty {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 10px;
    }

    .combo-card.disabled {
        opacity: 0.5;
        pointer-events: none;
    }
</style>

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <a href="{{ route('nhanVien.order.index') }}" class="btn-back mb-2">
                <i class="fa-solid fa-arrow-left"></i> Quay lại
            </a>
            <h2 class="header-title">Chọn Combo Buffet</h2>
        </div>
        <span class="text-muted fw-bold">{{ date('d/m/Y') }}</span>
    </div>

    {{-- CONTEXT INFO --}}
    <div class="context-box">
        <div class="context-item">
            <span class="context-label">Mã Order</span>
            <span class="context-value">Số: {{ $order->id }}</span>
        </div>
        <div style="width: 1px; height: 30px; background: #e2e8f0;"></div>
        <div class="context-item">
            <span class="context-label">Bàn Phục Vụ</span>
            <span class="context-value">
                @if($order->banAn)
                {{ $order->banAn->so_ban }}
                @else
                <span class="text-danger">Chưa xếp</span>
                @endif
            </span>
        </div>
    </div>

    <div class="mb-4">
        <h5 class="mb-2"></h5>
        <div class="filter-menu">
            <a href="{{ route('nhanVien.order.chon-combo', ['orderId' => $order->id]) }}"
                class="{{ request('price') ? '' : 'active' }}">Tất cả combo</a>
            @foreach ([99000, 199000, 299000, 399000, 499000] as $price)
            <a href="{{ route('nhanVien.order.chon-combo', ['orderId' => $order->id, 'price' => $price]) }}"
                class="{{ request('price') == $price ? 'active' : '' }}">
                {{ number_format($price/1000, 0) }}k
            </a>
            @endforeach
        </div>

    </div>

    {{-- COMBO GRID --}}
    <form method="POST" action="{{ route('nhanVien.order.luu-combo', $order->id) }}">
        @csrf
        <div class="row">
            @foreach ($combos as $combo)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="combo-card" data-price="{{ $combo->gia_co_ban }}">
                    {{-- Hình ảnh & Giá --}}
                    <div class="img-wrapper">
                        @php $imgPath = 'uploads/' . $combo->anh; @endphp
                        <img src="{{ file_exists(public_path($imgPath)) ? asset($imgPath) : 'https://placehold.co/600x400?text=No+Image' }}"
                            class="combo-img" alt="{{ $combo->ten_combo }}">
                        <div class="price-badge" id="price-badge-{{ $combo->id }}">
                            Tạm tính: <span class="badge-amount">{{ number_format($combo->gia_co_ban) }}</span> <span style="font-size:0.7em;font-weight:600;">đ</span>
                        </div>
                        <div class="price-original" style="
                            position: absolute;
                            top: 10px;
                            left: 10px;
                            background: rgba(254, 161, 22, 0.8);
                            color: #fff;
                            padding: 3px 8px;
                            border-radius: 4px;
                            font-weight: 700;
                            font-size: 0.85rem;
                            ">
                            {{ number_format($combo->gia_co_ban) }}đ
                        </div>
                    </div>

                    {{-- Body --}}
                    <div class="card-body-custom">
                        <h5 class="combo-title">{{ $combo->ten_combo }}</h5>
                        <span class="combo-desc-label"><i class="fa-solid fa-list-ul"></i> Menu bao gồm:</span>

                        <ul class="menu-list">
                            @foreach ($combo->monTrongCombo as $ct)
                            @if($ct->monAn)
                            @php $monImgPath = $ct->monAn->hinh_anh; @endphp
                            <li class="menu-item">
                                <img src="{{ file_exists(public_path($monImgPath)) ? asset($monImgPath) : 'https://placehold.co/100?text=Mon' }}"
                                    class="item-thumb" alt="{{ $ct->monAn->ten_mon }}">
                                <span class="item-name">{{ $ct->monAn->ten_mon }}</span>
                                <span class="item-qty">x{{ $ct->gioi_han_so_luong }}</span>
                            </li>
                            @endif
                            @endforeach
                            @if($combo->monTrongCombo->isEmpty())
                            <li class="text-muted small fst-italic">Đang cập nhật món...</li>
                            @endif
                        </ul>

                        {{-- Số lượng combo --}}
                        @php
                        $qtyInDb = $order->datBan->combos->where('id', $combo->id)->first()?->pivot->so_luong ?? 0;
                        @endphp
                        <div class="input-group mb-2" style="max-width: 130px;">
                            <button type="button" class="btn-decrease">-</button>
                            <input type="number" min="0" value="{{ $qtyInDb }}" class="form-control combo-qty"
                                name="combos[{{ $combo->id }}]"
                                data-price="{{ $combo->gia_co_ban }}">
                            <button type="button" class="btn-increase">+</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Giỏ hàng tạm tính --}}
        <div class="context-box mt-4">
            <div class="context-item flex-grow-1">
                <span class="context-label">Giỏ hàng tạm tính</span>
                <span class="context-value" id="cart-summary">Chưa chọn combo nào</span>
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn-select mt-3"><i class="fa-solid fa-check"></i> Xác nhận chọn combo</button>
    </form>
</div>
<div id="comboModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <button class="modal-close"><i class="fa-solid fa-xmark"></i></button>
        <div class="modal-body">
            <img src="" alt="" class="modal-img">
            <h3 class="modal-title"></h3>
            <p class="modal-price"></p>
            <p class="modal-desc"></p>
            <div class="modal-qty">
                <button class="btn-decrease">-</button>
                <input type="number" value="0" min="0" class="combo-qty">
                <button class="btn-increase">+</button>
            </div>
            <button class="btn-select modal-add">THÊM COMBO NGAY</button>
        </div>
    </div>
</div>


{{-- JS --}}
@push('scripts')
<script>
    const cartSummary = document.getElementById('cart-summary');

    function updateCart() {
        let total = 0;
        let lines = [];

        // Chỉ lấy input combo trên card chính
        document.querySelectorAll('.combo-card > .card-body-custom > .input-group .combo-qty').forEach(input => {
            const qty = parseInt(input.value) || 0;
            const comboCard = input.closest('.combo-card');
            const comboName = comboCard.querySelector('.combo-title').innerText;
            const price = parseInt(input.dataset.price) || 0;
            const subtotal = qty * price;

            // Cập nhật giá trên card
            const priceBadge = comboCard.querySelector('.price-badge');
            priceBadge.innerHTML = `${subtotal > 0 ? subtotal.toLocaleString() : price.toLocaleString()} <span style="font-size:0.7em;font-weight:600;">đ</span>`;

            if (qty > 0) {
                total += subtotal;
                lines.push(`${comboName} x${qty} = ${subtotal.toLocaleString()} đ`);
            }
        });

        cartSummary.innerText = lines.length ? lines.join(' | ') + ' | Tổng: ' + total.toLocaleString() + ' đ' : 'Chưa chọn combo nào';
    }

    function animateInput(input) {
        input.classList.add('animate');
        setTimeout(() => input.classList.remove('animate'), 150);
    }

    // Nút +
    document.querySelectorAll('.btn-increase').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.closest('.input-group').querySelector('.combo-qty');
            input.value = parseInt(input.value || 0) + 1;
            animateInput(input);
            updateCart();
        });
    });

    // Nút -
    document.querySelectorAll('.btn-decrease').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.closest('.input-group').querySelector('.combo-qty');
            input.value = Math.max(0, parseInt(input.value || 0) - 1);
            animateInput(input);
            updateCart();
        });
    });

    // Input trực tiếp
    document.querySelectorAll('.combo-qty').forEach(input => {
        input.addEventListener('input', () => {
            animateInput(input);
            updateCart();
        });
    });

    // --- Filter combo theo giá ---
    function filterCombos(price) {
        document.querySelectorAll('.col-lg-4').forEach(col => {
            const comboCard = col.querySelector('.combo-card');
            const comboPrice = parseInt(comboCard.dataset.price);

            if (!price || comboPrice === price) {
                col.style.display = 'block'; // hiện cả cột
            } else {
                col.style.display = 'none'; // ẩn cả cột để không chiếm space
            }
        });
    }
    // --- Modal ---
    const modal = document.getElementById('comboModal');
    const modalImg = modal.querySelector('.modal-img');
    const modalTitle = modal.querySelector('.modal-title');
    const modalPrice = modal.querySelector('.modal-price');
    const modalDesc = modal.querySelector('.modal-desc');
    const modalQty = modal.querySelector('.combo-qty');
    const modalClose = modal.querySelector('.modal-close');
    const modalIncrease = modal.querySelector('.btn-increase');
    const modalDecrease = modal.querySelector('.btn-decrease');
    const modalAddBtn = modal.querySelector('.modal-add');

    // Mở modal khi click vào combo card
    document.querySelectorAll('.combo-card').forEach(card => {
        card.addEventListener('click', e => {
            if (e.target.closest('input') || e.target.closest('button')) return; // ko bật khi click input
            const img = card.querySelector('.combo-img').src;
            const title = card.querySelector('.combo-title').innerText;
            const price = card.dataset.price;
            const descItems = Array.from(card.querySelectorAll('.menu-item')).map(li => {
                return li.querySelector('.item-name').innerText + ' x' + li.querySelector('.item-qty').innerText.replace('x', '');
            }).join('\n');

            modalImg.src = img;
            modalTitle.innerText = title;
            modalPrice.innerText = parseInt(price).toLocaleString() + ' đ';
            modalDesc.innerText = descItems || 'Đang cập nhật món...';

            // Lấy số lượng hiện tại từ card
            const mainInput = card.querySelector('.combo-qty');
            modalQty.value = mainInput.value || 0;

            modal.style.display = 'flex';

            // Nút + / - trong modal đồng bộ với card
            modalIncrease.onclick = () => {
                modalQty.value = parseInt(modalQty.value) + 1;
                mainInput.value = modalQty.value;
                animateInput(modalQty);
                animateInput(mainInput);
                updateCart();
            };
            modalDecrease.onclick = () => {
                modalQty.value = Math.max(0, parseInt(modalQty.value) - 1);
                mainInput.value = modalQty.value;
                animateInput(modalQty);
                animateInput(mainInput);
                updateCart();
            };
        });
    });

    // Nút thêm combo ngay
    modalAddBtn.addEventListener('click', () => {
        const comboTitleText = modalTitle.innerText;
        const comboCard = Array.from(document.querySelectorAll('.combo-card')).find(card => card.querySelector('.combo-title').innerText === comboTitleText);
        if (comboCard) {
            const mainInput = comboCard.querySelector('.combo-qty');
            mainInput.value = parseInt(modalQty.value) || 0;
            animateInput(mainInput);
            updateCart();
            modal.style.display = 'none';
        }
    });

    // Đóng modal
    modalClose.addEventListener('click', () => modal.style.display = 'none');
    modal.addEventListener('click', e => {
        if (e.target === modal) modal.style.display = 'none';
    });

    // Lấy giá filter từ request
    const selectedPrice = parseInt("{{ request('price') ?? 0 }}");
    filterCombos(selectedPrice);
    // Cập nhật cart lần đầu
    updateCart();

    function updateCart() {
        let total = 0;
        let lines = [];
        let selectedComboPrice = null;

        // Lặp qua tất cả input combo
        document.querySelectorAll('.combo-card > .card-body-custom > .input-group .combo-qty').forEach(input => {
            const qty = parseInt(input.value) || 0;
            const comboCard = input.closest('.combo-card');
            const comboName = comboCard.querySelector('.combo-title').innerText;
            const price = parseInt(input.dataset.price) || 0;
            const subtotal = qty * price;

            // Cập nhật giá trên card
            const priceBadge = comboCard.querySelector('.price-badge');
            priceBadge.innerHTML = `${subtotal > 0 ? subtotal.toLocaleString() : price.toLocaleString()} <span style="font-size:0.7em;font-weight:600;">đ</span>`;

            if (qty > 0) {
                total += subtotal;
                lines.push(`${comboName} x${qty} = ${subtotal.toLocaleString()} đ`);
                // Lấy giá combo đã chọn
                selectedComboPrice = price;
            }
        });

        // Cập nhật giỏ hàng
        cartSummary.innerText = lines.length ? lines.join(' | ') + ' | Tổng: ' + total.toLocaleString() + ' đ' : 'Chưa chọn combo nào';

        // --- Khóa combo khác giá ---
        document.querySelectorAll('.combo-card > .card-body-custom > .input-group .combo-qty').forEach(input => {
            const price = parseInt(input.dataset.price) || 0;
            if (selectedComboPrice && price !== selectedComboPrice) {
                input.disabled = true;
                input.closest('.combo-card').classList.add('disabled'); // bạn có thể style thẻ này mờ đi
            } else {
                input.disabled = false;
                input.closest('.combo-card').classList.remove('disabled');
            }
        });
    }
</script>

@endsection