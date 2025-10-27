<!DOCTYPE html>
<html lang="vi">

<head>
    <title>@yield('title', 'Trang quản trị')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/css/bootstrap-fix.css') }}">
    {{-- JS & CKEditor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('style')
</head>

<body onload="time()" class="app sidebar-mini rtl">

    <!-- Navbar -->
    <header class="app-header">
        <!-- Sidebar toggle button -->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

        <!-- Navbar Right Menu -->
        <ul class="app-nav">
            <li>
                <a class="app-nav__item" href="../index.html">
                    <i class='bx bx-log-out bx-rotate-180'></i>
                </a>
            </li>
        </ul>
    </header>

    <!-- Sidebar -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b>Ocean Buffet</b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>

        <hr>

        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="{{ route('dashboard') }}">
                    <i class='app-menu__icon bx bx-home'></i>
                    <span class="app-menu__label">Trang chủ</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="{{ route('san-pham') }}">
                    <i class='app-menu__icon bx bx-purchase-tag-alt'></i>
                    <span class="app-menu__label">Quản lý sản phẩm</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="{{ route('nhan-vien') }}">
                    <i class='app-menu__icon bx bx-id-card'></i>
                    <span class="app-menu__label">Quản lý người dùng</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="{{ route('don-hang') }}">
                    <i class='app-menu__icon bx bx-task'></i>
                    <span class="app-menu__label">Quản lý đơn hàng</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="{{ route('admin.mon-an.index') }}">
                    <i class='app-menu__icon bx bx-restaurant'></i>
                    <span class="app-menu__label">Quản lý món ăn</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.danh-muc.index') }}">
                    <i class='app-menu__icon bx bx-category'></i>
                    <span class="app-menu__label">Quản lý danh mục</span>
                </a>
            </li>

        </ul>
    </aside>

    <!-- Main Content -->
    <main class="app-content" style="background-color: #f8f9fa; min-height: 100vh; padding: 20px;">
        @yield('content')
    </main>

    {{-- JS Scripts --}}
    <script src="{{ asset('admin/doc/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/doc/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/doc/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/doc/js/main.js') }}"></script>
    <script src="{{ asset('admin/doc/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/doc/js/plugins/chart.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin/doc/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/doc/js/plugins/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>

    {{-- Thời gian thực --}}
    <script type="text/javascript">
        function time() {
            var today = new Date();
            var weekday = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
            var day = weekday[today.getDay()];
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            var nowTime = h + " giờ " + m + " phút " + s + " giây";
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            var tmp = '<span class="date">' + today + ' - ' + nowTime + '</span>';
            document.getElementById("clock").innerHTML = tmp;
            setTimeout(time, 1000);

            function checkTime(i) {
                return (i < 10) ? "0" + i : i;
            }
        }
    </script>

    {{-- Máy in --}}
    <script>
        var myApp = new function() {
            this.printTable = function() {
                var tab = document.getElementById('sampleTable');
                var win = window.open('', '', 'height=700,width=700');
                win.document.write(tab.outerHTML);
                win.document.close();
                win.print();
            }
        }
    </script>

    {{-- Script riêng từng trang --}}
    @yield('script')

</body>

</html>
