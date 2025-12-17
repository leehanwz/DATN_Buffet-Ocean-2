@extends('layouts.Shop.layout-nhanvien')

@section('title', 'Order món')

@section('content')
{{-- 1. FILE ÂM THANH NỘI BỘ (Đã sửa theo file ting_ting.mp3 của bạn) --}}
<audio id="notif-sound" preload="auto">
    <source src="{{ asset('assets/audio/ting_ting.mp3') }}" type="audio/mpeg">
</audio>

<main class="app-content">
    <div class="container-xxl px-4">
        {{-- Flash message --}}
        @if(session('success'))
        <div class="alert alert-success text-center fw-semibold rounded-3 shadow-sm mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning text-center fw-semibold rounded-3 shadow-sm mb-4">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('warning') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger text-center fw-semibold rounded-3 shadow-sm mb-4">
            <i class="bi bi-x-circle-fill me-2"></i> {{ session('error') }}
        </div>
        @endif

        {{-- TIÊU ĐỀ & NÚT BẬT TIẾNG --}}
        <div class="d-flex justify-content-between align-items-center mb-5 mt-3">
            <div>
                <h4 class="page-header-title m-0">Sơ đồ bàn ăn</h4>
                <p class="text-muted small ms-3 mb-0 mt-1">Theo dõi trạng thái thực tế</p>
            </div>
            
            {{-- NÚT BẬT/TẮT TIẾNG --}}
            <div class="d-flex gap-2 align-items-center">
                <button id="sound-toggle-btn" class="btn btn-white shadow-sm fw-bold border" style="min-width: 140px;">
                    <i class="bi bi-volume-mute-fill me-1"></i> <span>Bật tiếng</span>
                </button>
                <span id="status-indicator" class="btn btn-white shadow-sm border fw-bold text-secondary disabled" style="cursor: default;">
                    <i class="bi bi-arrow-repeat spin-slow me-1"></i> <span class="status-text">Đang tải...</span>
                </span>
            </div>
        </div>

        {{-- Phân khu vực --}}
        @foreach($khuVucs as $khu)
        <div class="card-zone mb-5">
            <div class="card-zone-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-building me-2"></i> {{ $khu->ten_khu_vuc }}</span>
                <span class="badge bg-white text-dark shadow-sm" style="opacity: 0.9;">Tầng {{ $khu->tang }}</span>
            </div>

            <div class="card-body p-4 bg-light-subtle">
                <div class="row g-3">
                    @foreach($bans->where('khu_vuc_id', $khu->id) as $ban)
                    @php
                        $order = $orders->has($ban->id) ? $orders[$ban->id] : null;
                        $datBanMoiNhat = \App\Models\DatBan::where('ban_id', $ban->id)->latest()->first();
                        
                        $cardClass = ''; $statusBadgeClass = ''; $statusText = ''; $iconClass = '';
                        if($ban->trang_thai == 'khong_su_dung') {
                            $cardClass = 'card-maintenance'; $statusBadgeClass = 'badge-maintenance'; $statusText = 'Bảo trì'; $iconClass = 'bi-slash-circle';
                        } elseif(isset($datBanMoiNhat) && $datBanMoiNhat->trang_thai == 'da_xac_nhan') {
                            $cardClass = 'card-reserved'; $statusBadgeClass = 'badge-reserved'; $statusText = 'Đã đặt'; $iconClass = 'bi-clock-history';
                        } elseif(isset($datBanMoiNhat) && $datBanMoiNhat->trang_thai == 'khach_da_den') {
                            $cardClass = 'card-active'; $statusBadgeClass = 'badge-active'; $statusText = $order ? 'Đang phục vụ' : 'Khách đã đến'; $iconClass = 'bi-people-fill';
                        } else {
                            $cardClass = ''; $statusBadgeClass = 'badge-free'; $statusText = 'Bàn trống'; $iconClass = 'bi-check-circle';
                        }
                    @endphp

                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 d-flex">
                        <div class="table-card {{ $cardClass }} flex-fill d-flex flex-column">
                            <i class="bi bi-disc table-icon-bg"></i>
                            <div class="p-3 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between align-items-start mb-2 position-relative" style="z-index: 2;">
                                        <div class="table-number">{{ $ban->so_ban }}</div>
                                        <div class="text-secondary fw-bold small">
                                            <i class="bi bi-grid-3x3-gap-fill text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="mb-3" style="position: relative; z-index: 2;">
                                        <span class="badge-custom {{ $statusBadgeClass }}">
                                            <i class="bi {{ $iconClass }} me-1"></i> {{ $statusText }}
                                        </span>
                                    </div>
                                    <div class="info-box" style="position: relative; z-index: 2;">
                                        @if($order)
                                            @if($order->datBan)
                                                <div class="fw-bold text-dark text-truncate mb-1">{{ $order->datBan->ten_khach }}</div>
                                            @endif
                                            <div class="small text-muted"><i class="bi bi-receipt"></i> #{{ $order->id }}</div>
                                            <div class="small text-muted"><i class="bi bi-basket3"></i> {{ $order->tong_mon }} món</div>
                                        @elseif(isset($datBanMoiNhat) && $datBanMoiNhat->trang_thai == 'da_xac_nhan')
                                            <div class="small fw-bold text-primary mb-1">SẮP ĐẾN:</div>
                                            <div class="fw-bold text-dark text-truncate">{{ $datBanMoiNhat->ten_khach }}</div>
                                            <div class="small text-danger mt-1">
                                                <i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($datBanMoiNhat->gio_den)->format('H:i') }}
                                            </div>
                                        @else
                                            <div class="text-muted small fst-italic">Sẵn sàng đón khách</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-3 text-center" style="position: relative; z-index: 2;">
                                    @if($order)
                                        <a href="{{ route('nhanVien.order.page', $order->id) }}" class="btn-ocean">
                                            <i class="bi bi-card-checklist"></i> Xem Order
                                        </a>
                                    @else
                                        @if($ban->trang_thai != 'khong_su_dung' && (!isset($datBanMoiNhat) || $datBanMoiNhat->trang_thai != 'da_xac_nhan'))
                                            <form action="{{ route('nhanVien.order.mo-order') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="ban_id" value="{{ $ban->id }}">
                                                <button type="submit" class="btn-ocean-outline">
                                                    <i class="bi bi-plus-lg"></i> Mở bàn
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>

{{-- TOAST THÔNG BÁO --}}
<div id="custom-toast">
    <i class="bi bi-bell-fill fs-4 bell-shake"></i>
    <div class="text-start">
        <strong class="d-block text-warning">BẾP VỪA LÊN MÓN!</strong>
        <span id="toast-message" class="text-white small">Có món mới cần phục vụ.</span>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
        const soundBtn = $('#sound-toggle-btn');
        const audio = document.getElementById("notif-sound");
        const statusIndicator = $('#status-indicator');
        
        let audioEnabled = false;
        let lastCount = 0; 
        let isFirstLoad = true;

        // 1. XỬ LÝ NÚT BẬT TIẾNG
        soundBtn.on('click', function() {
            if (!audioEnabled) {
                audio.play().then(() => {
                    audio.pause(); audio.currentTime = 0;
                    audioEnabled = true;
                    soundBtn.addClass('active').html('<i class="bi bi-volume-up-fill me-1"></i> <span>Đã bật tiếng</span>');
                    // Test thử 1 tiếng ting nhẹ để biết loa chạy
                    setTimeout(() => audio.play(), 200); 
                }).catch(err => alert("Vui lòng click lại để trình duyệt cho phép phát tiếng!"));
            } else {
                audioEnabled = false;
                soundBtn.removeClass('active').html('<i class="bi bi-volume-mute-fill me-1"></i> <span>Bật tiếng</span>');
            }
        });

        // 2. HIỆN THÔNG BÁO
        function showNotification(count) {
            if (audioEnabled) {
                audio.currentTime = 0;
                audio.play().catch(e => console.log(e));
            }
            const toast = document.getElementById("custom-toast");
            $('#toast-message').text(`Có ${count} món mới vừa xong!`);
            toast.className = "show";
            setTimeout(() => { toast.className = ""; }, 5000);
        }

        // 3. CHECK API TỪ TRANG HÀNG CHỜ
        function checkFoodReady() {
            statusIndicator.find('i').addClass('spin-fast');
            
            // Gọi vào API của trang "Hàng chờ" để đếm món
            axios.get("{{ route('nhanVien.phuc-vu.dashboard_api') }}")
                .then(res => {
                    let currentList = res.data.monChoPhucVu || [];
                    let currentCount = currentList.length;

                    // Nếu số lượng tăng lên so với lần trước -> Có món mới
                    if (!isFirstLoad && currentCount > lastCount) {
                        let diff = currentCount - lastCount;
                        showNotification(diff);
                    }

                    lastCount = currentCount;
                    isFirstLoad = false;

                    let now = new Date().toLocaleTimeString('vi-VN', {hour: '2-digit', minute:'2-digit'});
                    statusIndicator.html(`<i class="bi bi-check2-circle text-success me-1"></i> <span class="small">${now}</span>`);
                })
                .catch(err => {
                    console.log(err);
                    statusIndicator.html('<i class="bi bi-exclamation-triangle text-danger"></i> Lỗi');
                });
        }

        checkFoodReady();
        setInterval(checkFoodReady, 5000);
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;800&family=Nunito:wght@400;600;700&display=swap');

    :root {
        --primary: #fea116;
        --primary-hover: #db8a10;
        --dark: #0f172b;
        --light: #F1F8FF;
        --text-main: #1e293b;
        --white: #ffffff;
        --radius: 12px; /* Bo góc mềm mại hơn */
        --shadow-card: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    body {
        font-family: 'Nunito', sans-serif;
        background-color: var(--light);
        color: var(--text-main);
        padding-bottom: 80px; /* Tránh bị Toast che mất nội dung cuối */
    }

    /* --- ANIMATION --- */
    .app-content { animation: fadeIn 0.5s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    
    .spin-slow { animation: spin 3s linear infinite; }
    .spin-fast { animation: spin 1s linear infinite; }
    @keyframes spin { 100% { transform: rotate(360deg); } }

    /* --- HEADER SECTION --- */
    .page-header-title {
        font-family: 'Heebo', sans-serif;
        font-weight: 800;
        color: var(--dark);
        text-transform: uppercase;
        position: relative;
        padding-left: 15px;
        font-size: 1.5rem;
    }
    .page-header-title::before {
        content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%);
        height: 70%; width: 5px; background-color: var(--primary); border-radius: 2px;
    }

    /* --- ZONE CARD --- */
    .card-zone {
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow-card);
        overflow: hidden;
        border: none;
    }
    .card-zone-header {
        background: var(--dark);
        color: var(--primary);
        padding: 12px 20px;
        font-family: 'Heebo', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 3px solid var(--primary);
        font-size: 1rem;
    }

    /* --- TABLE CARD (QUAN TRỌNG) --- */
    .table-card {
        background: var(--white);
        border-radius: var(--radius);
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        height: 100%;
        min-height: 190px; /* Chiều cao cố định để các thẻ bằng nhau */
        display: flex;
        flex-direction: column;
    }

    /* Hiệu ứng hover chỉ áp dụng trên PC */
   /* --- RESPONSIVE MOBILE (DƯỚI 768PX) --- */
   @media (max-width: 768px) {
        /* 1. Tinh chỉnh Header (Tiêu đề to nhất) */
        .page-header-title {
            font-size: 1.2rem; /* Giảm cỡ chữ tiêu đề */
            padding-left: 10px;
        }
        /* Ẩn luôn dòng mô tả nhỏ "Theo dõi trạng thái..." cho đỡ chật */
        .text-muted.small.ms-3 {
            display: none;
        }
        /* Kéo Header và Nút bật tiếng gần nhau hơn */
        .d-flex.justify-content-between.align-items-center.mb-5 {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
            margin-bottom: 15px !important; /* Giảm khoảng cách xuống thân trang */
            margin-top: 10px !important;
        }
        
        /* 2. Tinh chỉnh Banner Khu vực (Cái thanh màu đen) */
        .card-zone-header {
            padding: 8px 12px; /* Làm thanh này mỏng lại */
            font-size: 0.85rem; /* Chữ bé lại xíu */
        }
        /* Giảm khoảng cách giữa các khu vực (đè lên class mb-5 gốc) */
        .card-zone.mb-5 {
            margin-bottom: 20px !important; 
        }

        /* 3. Nút bật tiếng & Trạng thái */
        .d-flex.gap-2.align-items-center {
            width: 100%;
            justify-content: space-between;
        }
        #sound-toggle-btn { 
            flex-grow: 1; 
            padding: 5px; /* Nút mỏng hơn */
            font-size: 0.9rem;
        }
        
        /* 4. Thẻ bàn (Giữ nguyên như cũ nhưng tinh chỉnh padding) */
        .table-card {
            min-height: 160px; /* Giảm chiều cao tối thiểu thêm chút nữa */
        }
        .table-card .p-3 {
            padding: 8px !important; /* Padding siêu nhỏ */
        }
        .table-number { font-size: 1.3rem; }
        .table-icon-bg { font-size: 2.5rem; top: -5px; right: -5px; }
        
        /* Chỉnh chữ trong thẻ bàn */
        .fw-bold.text-dark.text-truncate { font-size: 0.85rem; }
        .small { font-size: 0.7rem; }
        
        /* Nút thao tác */
        .btn-ocean, .btn-ocean-outline {
            font-size: 0.75rem;
            padding: 5px;
        }

        /* Toast thông báo */
        #custom-toast {
            bottom: 15px;
            padding: 8px 15px;
            width: 90%;
            min-width: auto;
        }
        #custom-toast i.fs-4 { font-size: 1.2rem !important; }
    }

    .table-icon-bg {
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 4rem;
        color: rgba(254, 161, 22, 0.08);
        transform: rotate(20deg);
        pointer-events: none;
    }

    /* Trạng thái bàn */
    .card-active { background: #fffbf2; border: 1px solid var(--primary); }
    .card-active .table-number { color: #d97706; }
    
    .card-reserved { background: #f0fdf4; border: 1px dashed #22c55e; }
    
    .card-maintenance { background: #f8fafc; border: 1px solid #cbd5e1; opacity: 0.7; }
    .card-maintenance .table-number { color: #94a3b8; }

    /* Số bàn */
    .table-number {
        font-family: 'Heebo', sans-serif;
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1;
    }

    .info-box { flex-grow: 1; display: flex; flex-direction: column; justify-content: center; min-height: 50px; }
    
    /* Badges */
    .badge-custom {
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.65rem;
        letter-spacing: 0.5px;
        display: inline-block;
        white-space: nowrap;
    }
    .badge-free { background: #e2e8f0; color: #475569; }
    .badge-active { background: var(--primary); color: #fff; }
    .badge-reserved { background: #22c55e; color: #fff; }
    .badge-maintenance { background: #64748b; color: #fff; }

    /* Buttons */
    .btn-ocean {
        background: var(--primary); color: #fff;
        border: none; border-radius: 6px;
        font-weight: 700; padding: 8px; width: 100%;
        display: block; text-align: center; text-decoration: none;
        transition: 0.2s; font-size: 0.9rem;
    }
    .btn-ocean:active { transform: scale(0.98); } /* Hiệu ứng nhấn trên mobile */
    
    .btn-ocean-outline {
        background: transparent; border: 1px solid var(--primary);
        color: var(--primary); border-radius: 6px;
        font-weight: 700; padding: 7px; width: 100%;
        display: block; text-align: center; text-decoration: none;
        transition: 0.2s; font-size: 0.9rem;
    }
    .btn-ocean-outline:active { background: #fff8e6; }

    /* --- TOAST & SOUND BTN --- */
    #sound-toggle-btn.active { background-color: #198754 !important; color: #fff !important; border-color: #198754 !important; }
    
    #custom-toast {
        visibility: hidden; min-width: 300px; max-width: 90%;
        background-color: #212529; color: #fff;
        border-radius: 50px; padding: 12px 20px;
        position: fixed; z-index: 9999;
        left: 50%; bottom: 30px; transform: translateX(-50%);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        display: flex; align-items: center; gap: 15px;
        border: 2px solid #fea116;
        font-size: 0.9rem;
    }
    #custom-toast.show { visibility: visible; animation: fadeUp 0.5s forwards, fadeOut 0.5s 4.5s forwards; }
    @keyframes fadeUp { from { bottom: 0; opacity: 0; } to { bottom: 30px; opacity: 1; } }
    @keyframes fadeOut { from { opacity: 1; } to { opacity: 0; } }
    .bell-shake { color: #fea116; animation: shake 0.5s infinite; }
    @keyframes shake { 0% { transform: rotate(0); } 25% { transform: rotate(10deg); } 75% { transform: rotate(-10deg); } 100% { transform: rotate(0); } }

    /* --- RESPONSIVE MOBILE (DƯỚI 768PX) --- */
    @media (max-width: 768px) {
        /* Header: Xếp dọc trên điện thoại */
        .d-flex.justify-content-between.align-items-center.mb-5 {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 15px;
            margin-bottom: 20px !important;
        }
        
        /* Nút bật tiếng full chiều rộng để dễ bấm */
        .d-flex.gap-2.align-items-center {
            width: 100%;
            justify-content: space-between;
        }
        #sound-toggle-btn { flex-grow: 1; }
        
        /* Thẻ bàn nhỏ gọn hơn */
        .table-card {
            min-height: 170px; /* Giảm chiều cao */
        }
        .table-card .p-3 {
            padding: 10px !important; /* Giảm padding */
        }
        .table-number { font-size: 1.4rem; }
        .table-icon-bg { font-size: 3rem; top: -5px; right: -5px; }
        
        /* Chỉnh chữ nhỏ lại một chút */
        .fw-bold.text-dark.text-truncate { font-size: 0.9rem; }
        .small { font-size: 0.75rem; }
        
        /* Nút thao tác */
        .btn-ocean, .btn-ocean-outline {
            font-size: 0.8rem;
            padding: 6px;
        }

        /* Toast hiện cao hơn chút trên mobile */
        #custom-toast {
            bottom: 20px;
            padding: 10px 15px;
        }
        #custom-toast i.fs-4 { font-size: 1.2rem !important; }
    }
</style>
@endsection