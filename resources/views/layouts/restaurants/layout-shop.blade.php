<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Bàn - Dự Án Tốt Nghiệp</title>
    <!-- Tải Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f7;
        }
        .nav-link:hover {
            color: #ef4444 !important; /* text-red-500 */
        }
        /* Style cho nút Đặt bàn nổi bật */
        .btn-reservation {
            background-color: #ef4444; /* text-red-500 */
            transition: transform 0.2s;
        }
        .btn-reservation:hover {
            background-color: #dc2626; /* text-red-600 */
            transform: scale(1.05);
        }
        .card-shadow {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="text-gray-800">

    <!-- HEADER & NAVIGATION -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-600">
                Ocean Buffet
            </h1>
            <!-- Menu cho Desktop -->
            <nav class="hidden lg:flex space-x-6 text-lg font-medium">
                <a href="#menu" class="nav-link text-gray-700">Thực đơn</a>
                <a href="#co-so" class="nav-link text-gray-700">Cơ sở</a>
                <a href="#uu-dai" class="nav-link text-gray-700">Ưu đãi</a>
                <a href="#lien-he" class="nav-link text-gray-700">Liên hệ</a>
            </nav>
            <a href="{{ route('booking.index') }}" class="btn-booking-vip">
                Đặt Bàn Ngay <i class="fa fa-arrow-right ms-2"></i>
            </a>
            
            <!-- Menu cho Mobile (Hamburger Icon - chỉ là placeholder vì không có JS) -->
            <div class="lg:hidden text-2xl cursor-pointer" onclick="alert('Bạn có thể thêm Javascript để bật/tắt menu mobile tại đây.')">
                &#9776; 
            </div>
        </div>
        <!-- Thanh Đặt bàn cố định ở dưới cho Mobile/Tablet -->
      
    </header>

    <main>
        <!-- 1. BANNER LỚN -->
        <section id="banner" class="w-full h-[50vh] md:h-[70vh] bg-gray-600 flex items-center justify-center text-white relative">
            <!-- Khu vực chèn ảnh/background-image của bạn -->
            <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                <h2 class="text-4xl md:text-6xl font-extrabold mb-4 text-center">TRẢI NGHIỆM ẨM THỰC ĐỈNH CAO</h2>
                <p class="text-xl md:text-2xl font-light mb-8 text-center">Đặt bàn dễ dàng, thưởng thức tinh hoa.</p>
                <a href="#dat-ban" class="btn-reservation text-white px-8 py-3 rounded-xl font-bold text-xl uppercase tracking-wider hover:shadow-xl">
                    Đặt Bàn Ngay
                </a>
            </div>
        </section>

        <!-- 2. THỰC ĐƠN (MENU) - ĐỔ DỮ LIỆU TỪ DB -->
        <section id="menu" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h3 class="text-4xl font-bold text-center mb-12 text-gray-900">🍔 Thực đơn hôm nay</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    @if(isset($mon_an_list) && $mon_an_list->count() > 0)
                        @foreach ($mon_an_list as $item)
                        <div class="bg-gray-50 rounded-xl overflow-hidden card-shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                            <div class="h-48 bg-gray-300 overflow-hidden relative group">
                                @php
                                    $imagePath = $item->hinh_anh;
                                    if (!Str::startsWith($imagePath, 'http')) {
                                        $imagePath = asset($imagePath);
                                    }
                                @endphp
                                
                                <img src="{{ $imagePath }}" 
                                     alt="{{ $item->ten_mon }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                     onerror="this.src='https://placehold.co/400x300?text=Mon+An'">
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <h4 class="text-2xl font-semibold mb-2 line-clamp-1" title="{{ $item->ten_mon }}">
                                    {{ $item->ten_mon }}
                                </h4>
                                <p class="text-gray-600 mb-3 line-clamp-2 flex-grow">
                                    {{ $item->mo_ta ? $item->mo_ta : 'Món ngon mỗi ngày tại nhà hàng.' }}
                                </p>
                                <div class="flex justify-between items-center mt-auto">
                                    <span class="text-2xl font-bold text-red-600">
                                        {{ number_format($item->gia, 0, ',', '.') }} đ
                                    </span>
                                    <button class="bg-red-100 text-red-600 font-medium px-4 py-2 rounded-full hover:bg-red-200 transition">
                                        Chi tiết
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-span-3 text-center py-10">
                            <p class="text-xl text-gray-500 mb-2">Chưa có món ăn nào được cập nhật.</p>
                            <p class="text-sm text-gray-400">(Vui lòng kiểm tra lại dữ liệu trong Admin > Món ăn > Trạng thái: "Còn")</p>
                        </div>
                    @endif
        
                </div>
            </div>
        </section>

        <!-- 3. CƠ SỞ (LOCATIONS) - HTML CỨNG -->
        <section id="co-so" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h3 class="text-4xl font-bold text-center mb-12 text-gray-900">📍 Hệ thống Cơ sở</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <!-- Cơ sở 1 -->
                    <div class="bg-white p-6 rounded-xl card-shadow border-t-4 border-red-500">
                        <h4 class="text-2xl font-bold mb-3 text-red-600">Cơ Sở 1: Hà Nội</h4>
                        <p class="mb-2"><strong>Địa chỉ:</strong> Số 123, Phố Thái Hà, Đống Đa, Hà Nội</p>
                        <p class="mb-2"><strong>Giờ mở cửa:</strong> 10:00 - 22:00 (Thứ 2 - Chủ Nhật)</p>
                        <p><strong>Hotline:</strong> 0987 654 321</p>
                    </div>

                    <!-- Cơ sở 2 -->
                    <div class="bg-white p-6 rounded-xl card-shadow border-t-4 border-red-500">
                        <h4 class="text-2xl font-bold mb-3 text-red-600">Cơ Sở 2: TP. Hồ Chí Minh</h4>
                        <p class="mb-2"><strong>Địa chỉ:</strong> 456, Đường Nguyễn Văn Cừ, Quận 5, TP.HCM</p>
                        <p class="mb-2"><strong>Giờ mở cửa:</strong> 09:30 - 23:00 (Mỗi ngày)</p>
                        <p><strong>Hotline:</strong> 0912 345 678</p>
                    </div>

                    <!-- Cơ sở 3 -->
                    <div class="bg-white p-6 rounded-xl card-shadow border-t-4 border-red-500">
                        <h4 class="text-2xl font-bold mb-3 text-red-600">Cơ Sở 3: Đà Nẵng</h4>
                        <p class="mb-2"><strong>Địa chỉ:</strong> Lô A7, Đường Võ Nguyên Giáp, Sơn Trà, Đà Nẵng</p>
                        <p class="mb-2"><strong>Giờ mở cửa:</strong> 11:00 - 22:00 (Thứ 3 - Chủ Nhật)</p>
                        <p><strong>Hotline:</strong> 0900 112 233</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- 4. ƯU ĐÃI (PROMOTIONS) -->
        {{-- <section id="uu-dai" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h3 class="text-4xl font-bold text-center mb-12 text-gray-900">🎁 Các gói Combo Ưu đãi</h3>
                <div class="max-w-4xl mx-auto space-y-6">
                    
                    @foreach($combo_list as $combo)
                    <div class="bg-yellow-50 p-6 rounded-xl border-l-8 border-yellow-500 flex flex-col md:flex-row items-center justify-between card-shadow hover:bg-yellow-100 transition">
                        <div class="flex items-center">
                            @if($combo->anh)
                                <img src="{{ asset($combo->anh) }}" class="w-20 h-20 object-cover rounded-lg mr-4 hidden md:block" alt="">
                            @endif
                            <div>
                                <h4 class="text-2xl font-bold text-yellow-800 mb-1">{{ $combo->ten_combo }}</h4>
                                <p class="text-gray-700">
                                    Giá chỉ: <span class="font-bold text-red-600">{{ number_format($combo->gia_co_ban, 0, ',', '.') }}đ</span>
                                    - {{ $combo->mo_ta }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('combos.show', $combo->id) }}" class="mt-4 md:mt-0 ml-0 md:ml-4 bg-yellow-600 text-white font-semibold px-4 py-2 rounded-full hover:bg-yellow-700 text-center min-w-[120px]">
                            Xem ngay
                        </a>
                    </div>
                    @endforeach
        
                </div>
            </div>
        </section> --}}

        <!-- 5. BÀI VIẾT (TIN TỨC) - Dạng GRID 3 CỘT -->
        <section id="bai-viet" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <h3 class="text-4xl font-bold text-center mb-12 text-gray-900">📰 Góc Bài Viết & Tin tức</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <!-- Bài viết 1 -->
                    <div class="bg-white rounded-xl overflow-hidden card-shadow hover:shadow-xl transition duration-300">
                        <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500 font-semibold">
                            [Ảnh Bài Viết 1]
                        </div>
                        <div class="p-5">
                            <h4 class="text-xl font-bold mb-2 line-clamp-2">Tuyệt chiêu nấu món lẩu thái chuẩn vị nhà hàng</h4>
                            <p class="text-sm text-gray-500 mb-3">Ngày đăng: 05/11/2025</p>
                            <p class="text-gray-600 line-clamp-3">Nội dung tóm tắt: Khám phá công thức bí mật để tạo nên nồi lẩu Thái chua cay đậm đà, hấp dẫn, làm hài lòng cả những thực khách khó tính nhất...</p>
                            <a href="#" class="text-red-500 font-semibold mt-3 inline-block hover:underline">Đọc tiếp &rarr;</a>
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
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="bg-white rounded-xl overflow-hidden card-shadow hover:shadow-xl transition duration-300">
                        <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500 font-semibold">
                            [Ảnh Bài Viết 3]
                        </div>
                        <div class="p-5">
                            <h4 class="text-xl font-bold mb-2 line-clamp-2">Câu chuyện đằng sau món Phở truyền thống của Việt Nam</h4>
                            <p class="text-sm text-gray-500 mb-3">Ngày đăng: 28/10/2025</p>
                            <p class="text-gray-600 line-clamp-3">Nội dung tóm tắt: Tìm hiểu về lịch sử hình thành, sự khác biệt giữa Phở Bắc và Phở Nam, và cách chế biến nước dùng Phở ngon nhất...</p>
                            <a href="#" class="text-red-500 font-semibold mt-3 inline-block hover:underline">Đọc tiếp &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- 6. Đặt Bàn -->

        <section id="dat-ban" class="py-16 bg-red-50">
            <div class="container mx-auto px-4 max-w-2xl">
                <h3 class="text-4xl font-bold text-center mb-8 text-red-700">🗓️ Đặt bàn Online</h3>
                <p class="text-center text-gray-600 mb-8">Vui lòng điền thông tin để chúng tôi phục vụ bạn tốt nhất.</p>
                
                <form action="{{ route('booking.store') }}" method="POST" class="bg-white p-8 rounded-xl card-shadow border-t-4 border-red-500">
                    @csrf @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                            <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                        </div>
                    @endif
        
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Họ và Tên (*)</label>
                        <input type="text" id="name" name="ten_khach" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500" placeholder="Nguyễn Văn A">
                    </div>
        
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Số điện thoại (*)</label>
                        <input type="tel" id="phone" name="sdt_khach" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500" placeholder="090 123 4567">
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email_khach" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500" placeholder="email@example.com">
                    </div>
        
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="date" class="block text-gray-700 font-medium mb-2">Ngày giờ đến (*)</label>
                            <input type="datetime-local" id="date" name="gio_den" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        </div>
                        <div>
                             <label for="guests" class="block text-gray-700 font-medium mb-2">Người lớn (*)</label>
                            <input type="number" name="nguoi_lon" required min="1" value="1" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        </div>
                    </div>
                     <div class="mb-4">
                        <label for="children" class="block text-gray-700 font-medium mb-2">Trẻ em</label>
                        <input type="number" name="tre_em" value="0" min="0" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                    </div>
                    
                    <div class="mb-6">
                        <label for="note" class="block text-gray-700 font-medium mb-2">Ghi chú</label>
                        <textarea id="note" name="ghi_chu" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500" placeholder="Ví dụ: Bàn gần cửa sổ..."></textarea>
                    </div>
        
                    <button type="submit" class="btn-reservation w-full text-white px-6 py-3 rounded-lg font-bold text-lg uppercase tracking-wider hover:shadow-xl">
                        Xác nhận Đặt Bàn
                    </button>
                </form>
            </div>
        </section>
        
        <!-- 7. LIÊN HỆ (CONTACT) -->
        <section id="lien-he" class="py-16 bg-white">
            <div class="container mx-auto px-4 max-w-4xl">
                <h3 class="text-4xl font-bold text-center mb-12 text-gray-900">📞 Liên hệ chúng tôi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <span class="text-red-500 text-2xl">📧</span>
                            <div>
                                <h4 class="font-semibold">Email hỗ trợ</h4>
                                <p class="text-gray-600">contact@tenquan.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <span class="text-red-500 text-2xl">📞</span>
                            <div>
                                <h4 class="font-semibold">Tổng đài</h4>
                                <p class="text-gray-600">1900 6789 (Hỗ trợ 24/7)</p>
                            </div>
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
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 py-4">
            <p class="text-center text-gray-500 text-sm">
                © {{ date('Y') }} [Tên Quán]. Thiết kế bởi Nhóm Đồ Án Tốt Nghiệp.
            </p>
        </div>
    </footer>
    
</body>
</html>