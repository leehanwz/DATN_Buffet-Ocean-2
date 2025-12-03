<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Ocean Buffet - @yield('title', 'Trang chủ')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Buffet, Ocean, Hải Sản, Nướng, Lẩu" name="keywords">
    <meta content="Ocean Buffet - Thiên đường hải sản và nướng" name="description">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{asset('restaurant/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('restaurant/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('restaurant/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <link href="{{asset('restaurant/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('restaurant/css/style.css')}}" rel="stylesheet">

    {{-- CUSTOM CSS ĐỂ GIỐNG QUÁN NHẬU TỰ DO --}}
    <style>
        :root {
            /* Đổi màu chủ đạo từ Cam sang Xanh/Vàng giống style quán nhậu */
            --primary: #fea116; /* Giữ màu vàng cam cho nút bấm */
            --dark: #0f172b;
            --brand-green: #083826; /* Màu xanh đậm đặc trưng quán nhậu */
            --light: #f1f8ff;
        }

        /* Top Bar Info */
        .top-bar {
            background-color: var(--brand-green);
            color: #fff;
            font-size: 0.9rem;
            padding: 8px 0;
        }
        .top-bar a { color: #fff; text-decoration: none; margin-right: 15px; }
        .top-bar i { color: var(--primary); margin-right: 5px; }

        /* Navbar Styling */
        .navbar-dark {
            background: rgba(15, 23, 43, 0.95) !important; /* Làm tối thanh menu */
        }
        .navbar-dark .navbar-nav .nav-link {
            text-transform: uppercase;
            font-weight: 700;
            font-size: 15px;
        }
        
        /* Nút đặt bàn nổi bật */
        .btn-booking-vip {
            background-color: var(--primary);
            color: #fff;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid var(--primary);
            transition: all 0.3s;
            animation: pulse 2s infinite;
        }
        .btn-booking-vip:hover {
            background-color: transparent;
            color: var(--primary);
        }

        /* Hero Header cho giống Banner quảng cáo */
        .hero-header {
            background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url('{{ asset("restaurant/img/bg-hero.jpg") }}');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            margin-bottom: 3rem !important; 
        }

        /* Footer */
        .footer {
            background-color: var(--brand-green) !important;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(254, 161, 22, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(254, 161, 22, 0); }
            100% { box-shadow: 0 0 0 0 rgba(254, 161, 22, 0); }
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Đang tải...</span>
            </div>
        </div>
        <div class="container-fluid top-bar d-none d-lg-block">
            <div class="container px-0">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-8 text-start">
                        <a href="#"><i class="fa fa-map-marker-alt"></i>Hà Nội, Việt Nam</a>
                        <a href="tel:0123456789"><i class="fa fa-phone-alt"></i>Hotline: 1900 1234</a>
                        <span class="text-light"><i class="far fa-clock"></i>Giờ mở cửa: 10:00 - 23:00</span>
                    </div>
                    <div class="col-lg-4 text-end">
                        <div class="d-inline-flex align-items-center" style="height: 45px;">
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0 sticky-top">
                <a href="{{ route('home') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0" style="font-family: 'Pacifico', cursive; font-size: 3rem;">
                        <i class="fa fa-fish me-3"></i>Ocean Buffet
                    </h1>
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a>
                        
                        {{-- Dropdown Thực Đơn --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('combos.*') ? 'active' : '' }}" data-bs-toggle="dropdown">Thực Đơn</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('combos.index') }}" class="dropdown-item">Combo Buffet</a>
                                <a href="#" class="dropdown-item">Món Gọi Thêm</a>
                                <a href="#" class="dropdown-item">Đồ Uống</a>
                            </div>
                        </div>

                        <a href="#" class="nav-item nav-link">Khuyến Mãi</a>
                        <a href="#" class="nav-item nav-link">Không Gian</a>
                        <a href="#" class="nav-item nav-link">Liên Hệ</a>
                    </div>
                    
                    {{-- Nút Call To Action nổi bật --}}
                    <a href="{{ route('booking.index') }}" class="btn-booking-vip">
                        Đặt Bàn Ngay <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </nav>

            @if(request()->routeIs('home'))
                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container my-5 py-5">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="display-3 text-white animated slideInLeft">Thưởng Thức<br>Hải Sản Tươi Sống</h1>
                                <p class="text-white animated slideInLeft mb-4 pb-2">Không gian thoáng đãng, mồi ngon, bia mát. Điểm đến lý tưởng cho các cuộc tụ họp bạn bè và gia đình.</p>
                                <a href="{{ route('booking.index') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Đặt Bàn Ngay</a>
                            </div>
                            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                                <img class="img-fluid" src="{{asset('restaurant/img/hero.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Trang chủ</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
        <main>
            @yield('content')
        </main>
       
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Về Ocean Buffet</h4>
                        <a class="btn btn-link" href="">Giới thiệu</a>
                        <a class="btn btn-link" href="">Tuyển dụng</a>
                        <a class="btn btn-link" href="">Chính sách bảo mật</a>
                        <a class="btn btn-link" href="">Điều khoản sử dụng</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Liên Hệ</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Hà Nội, Việt Nam</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>1900 1234</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>contact@oceanbuffet.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Giờ Mở Cửa</h4>
                        <h5 class="text-light fw-normal">Thứ 2 - Thứ 6</h5>
                        <p>10:00 - 22:00</p>
                        <h5 class="text-light fw-normal">Thứ 7 & Chủ Nhật</h5>
                        <p>09:00 - 23:00</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Đăng Ký Nhận Tin</h4>
                        <p>Nhận thông tin khuyến mãi mới nhất từ Ocean Buffet.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Email của bạn">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Ocean Buffet</a>, All Right Reserved. 
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <a href="#">Cookies</a>
                                <a href="#">Trợ giúp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('restaurant/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('restaurant/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{asset('restaurant/js/main.js')}}"></script>
</body>

</html>