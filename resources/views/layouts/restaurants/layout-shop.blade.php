<!DOCTYPE html>
<<<<<<< HEAD
<html lang="vi">
=======
<html lang="en">

>>>>>>> dev
<head>
    <meta charset="utf-8">
    {{-- <title>Restoran - Bootstrap Restaurant Template</title> --}}
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<<<<<<< HEAD
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">
=======
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
>>>>>>> dev

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
<<<<<<< HEAD
    <link href="{{ asset('restaurant/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('restaurant/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('restaurant/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('restaurant/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('restaurant/css/style.css') }}" rel="stylesheet">
=======
    <link href="{{asset('restaurant/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('restaurant/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('restaurant/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('restaurant/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('restaurant/css/style.css')}}" rel="stylesheet">
>>>>>>> dev
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
<<<<<<< HEAD
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
=======
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
>>>>>>> dev
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
<<<<<<< HEAD
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
=======
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
>>>>>>> dev
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
<<<<<<< HEAD

                        {{-- Các route chưa dùng --}}
                        {{-- 
                    <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                    <a href="{{route('service')}}" class="nav-item nav-link">Service</a>
                    <a href="{{route('menu')}}" class="nav-item nav-link">Menu</a>
                    --}}

                        {{-- Combo Buffet hoạt động --}}
                        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>

                        <a href="{{ route('combos.index') }}" class="nav-item nav-link">Thực đơn</a>

                        {{-- Route chưa dùng --}}
                        {{-- <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a> --}}
                    </div>

                    {{-- Nút đặt bàn vẫn giữ --}}
                    <a href="{{ route('booking.index') }}" class="btn btn-primary py-2 px-4">Book A Table</a>
=======
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                        <a href="{{route('service')}}" class="nav-item nav-link">Service</a>
                        <a href="{{route('menu')}}" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{route('booking')}}" class="dropdown-item">Booking</a>
                                <a href="{{route('team')}}" class="dropdown-item">Our Team</a>
                                <a href="{{route('testimonial')}}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{route('booking')}}" class="btn btn-primary py-2 px-4">Book A Table</a>
>>>>>>> dev
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Ocean Buffet</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav> --}}
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        {{-- nd --}}
        <main>
            @yield('content')
        </main>

<<<<<<< HEAD
        <!-- Footer Start -->
=======
 <!-- Footer Start -->
>>>>>>> dev
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
<<<<<<< HEAD
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="bg-white rounded-xl overflow-hidden card-shadow hover:shadow-xl transition duration-300">
                        <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500 font-semibold">
                            [Ảnh Bài Viết 2]
                        </div>
                        <div class="p-5">
                            <h4 class="text-xl font-bold mb-2 line-clamp-2">5 cách phối rượu vang với món bò bít tết hoàn hảo</h4>
                            <p class="text-sm text-gray-500 mb-3">Ngày đăng: 01/11/2025</p>
                            <p class="text-gray-600 line-clamp-3">Nội dung tóm tắt: Hướng dẫn chi tiết cách chọn lựa loại rượu vang phù hợp nhất, từ Cabernet Sauvignon đến Merlot, để nâng tầm hương vị món bò bít tết...</p>
                            <a href="#" class="text-red-500 font-semibold mt-3 inline-block hover:underline">Đọc tiếp &rarr;</a>
                        </div>
=======
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
>>>>>>> dev
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
<<<<<<< HEAD
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
=======
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
>>>>>>> dev
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
<<<<<<< HEAD
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com"
                                target="_blank">ThemeWagon</a>
                        </div>
                        <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <span class="text-red-500 text-2xl">💬</span>
                            <div>
                                <h4 class="font-semibold">Facebook Messenger</h4>
                                <p class="text-gray-600">facebook.com/tenquan</p>
                            </div>
                        </div>
                    </div>
                    <!-- Map Placeholder -->
                    <div class="bg-gray-200 h-64 rounded-xl flex items-center justify-center text-gray-500">
                        [Bản đồ Google Maps Placeholder]
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white mt-10">
        <div class="container mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Cột 1: Giới thiệu -->
            <div>
                <h5 class="text-xl font-bold mb-4 text-red-500">Về [Tên Quán]</h5>
                <p class="text-gray-400 text-sm">
                    Mang đến trải nghiệm ẩm thực chất lượng nhất với không gian ấm cúng và dịch vụ chuyên nghiệp. Cảm ơn bạn đã tin tưởng và ủng hộ chúng tôi.
                </p>
            </div>
            <!-- Cột 2: Điều hướng nhanh -->
            <div>
                <h5 class="text-xl font-bold mb-4 text-red-500">Khám phá</h5>
                <ul class="space-y-2">
                    <li><a href="#menu" class="text-gray-400 hover:text-white transition duration-200">Thực đơn</a></li>
                    <li><a href="#co-so" class="text-gray-400 hover:text-white transition duration-200">Cơ sở</a></li>
                    <li><a href="#uu-dai" class="text-gray-400 hover:text-white transition duration-200">Ưu đãi</a></li>
                    <li><a href="#bai-viet" class="text-gray-400 hover:text-white transition duration-200">Tin tức</a></li>
                </ul>
            </div>
            <!-- Cột 3: Chính sách -->
            <div>
                <h5 class="text-xl font-bold mb-4 text-red-500">Hỗ trợ</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-200">Chính sách bảo mật</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-200">Điều khoản dịch vụ</a></li>
                    <li><a href="#lien-he" class="text-gray-400 hover:text-white transition duration-200">FAQ</a></li>
                </ul>
            </div>
            <!-- Cột 4: Liên hệ & Mạng xã hội -->
            <div>
                <h5 class="text-xl font-bold mb-4 text-red-500">Kết nối</h5>
                <p class="text-gray-400 mb-4">Theo dõi chúng tôi trên mạng xã hội:</p>
                <div class="flex space-x-4 text-2xl">
                    <a href="#" class="hover:text-red-500 transition duration-200">📘</a> <!-- Facebook -->
                    <a href="#" class="hover:text-red-500 transition duration-200">📸</a> <!-- Instagram -->
                    <a href="#" class="hover:text-red-500 transition duration-200">🐦</a> <!-- Twitter -->
=======
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
>>>>>>> dev
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
<<<<<<< HEAD
    <script src="{{ asset('restaurant/js/main.js') }}"></script>
    @stack('scripts') {{-- Thêm dòng này --}}
</body>
</html>
=======
    <script src="{{asset('restaurant/js/main.js')}}"></script>
</body>

</html>
>>>>>>> dev
