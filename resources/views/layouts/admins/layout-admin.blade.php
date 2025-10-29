<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/css/bootstrap-fix.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('style')
    {{-- Thêm CSS fix layout --}}
    <style>
        body {
            background-color: #f8f9fa;
        }

        .app-sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #002b5b;
            color: white;
            overflow-y: auto;
        }

        main {
            margin-left: 250px; /* chừa chỗ cho sidebar */
            min-height: 100vh;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .app-header {
            margin-left: 250px;
            background-color: #002b5b;
            color: white;
            padding: 10px 20px;
        }

        .app-sidebar__user-avatar {
            border-radius: 50%;
            object-fit: cover;
        }

        .app-menu__item {
            color: white;
            transition: background 0.3s ease;
        }

        .app-menu__item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .app-menu__label {
            font-weight: 500;
        }

        .app-sidebar__user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
        }

        .app-sidebar__user-name {
            margin: 0;
            font-size: 1rem;
        }

        .app-sidebar__user-designation {
            margin: 0;
            font-size: 0.8rem;
            opacity: 0.8;
        }
    </style>
</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar -->
    <header class="app-header d-flex justify-content-between align-items-center">
        <h5 class="m-0"><i class='bx bx-restaurant'></i> Ocean Buffet Admin</h5>
        <ul class="app-nav list-unstyled mb-0 d-flex align-items-center">
            <li>
                <a class="app-nav__item text-white" href="../index.html" title="Đăng xuất">
                    <i class='bx bx-log-out bx-rotate-180 fs-4'></i>
                </a>
            </li>
        </ul>
    </header>

    <!-- Sidebar -->
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b>Ocean Buffet</b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr class="text-white opacity-50 mx-3">
        <ul class="app-menu list-unstyled px-2">
            <li><a class="app-menu__item d-flex align-items-center py-2" href="{{route('dashboard')}}">
                    <i class='app-menu__icon bx bx-home me-2'></i>
                    <span class="app-menu__label">Trang chủ</span>
                </a>
            </li>
            <li><a class="app-menu__item d-flex align-items-center py-2" href="{{route('san-pham')}}">
                    <i class='app-menu__icon bx bx-purchase-tag-alt me-2'></i>
                    <span class="app-menu__label">Quản lý sản phẩm</span>
                </a>
            </li>
            <li><a class="app-menu__item d-flex align-items-center py-2" href="{{route('nhan-vien')}}">
                    <i class='app-menu__icon bx bx-id-card me-2'></i>
                    <span class="app-menu__label">Quản lý người dùng</span>
                </a>
            </li>
            <li><a class="app-menu__item d-flex align-items-center py-2" href="{{route('don-hang')}}">
                    <i class='app-menu__icon bx bx-task me-2'></i>
                    <span class="app-menu__label">Quản lý đơn hàng</span>
                </a>
            </li>
            <li><a class="app-menu__item d-flex align-items-center py-2" href="{{route('admin.danh-muc.index')}}">
                    <i class="app-menu__icon bx bx-menu me-2"></i>
                    <span class="app-menu__label">Danh mục món</span>
                </a>
            </li>
             <li>
                <a class="app-menu__item" href="{{ route('admin.mon-an.index') }}">
                    <i class='app-menu__icon bx bx-restaurant'></i>
                    <span class="app-menu__label">Quản lý món ăn</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    {{-- JS --}}
    <script src="{{ asset('admin/doc/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/doc/js/popper.min.js') }}"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="{{ asset('admin/doc/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/doc/js/main.js') }}"></script>
    <script src="{{ asset('admin/doc/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/doc/js/plugins/chart.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin/doc/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>

    {{-- thời gian thực --}}
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
            m = (m < 10 ? '0' : '') + m;
            s = (s < 10 ? '0' : '') + s;
            document.getElementById("clock").innerHTML = `${day}, ${dd}/${mm}/${yyyy} - ${h}:${m}:${s}`;
            setTimeout(time, 1000);
        }
    </script>

    {{-- máy in --}}
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

    @yield('script')
</body>

</html>
