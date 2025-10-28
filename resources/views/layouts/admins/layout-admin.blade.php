<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/css/main.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

  @yield('style')
</head>
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar -->
  <header class="app-header">
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
      <li><a class="app-nav__item" href="../index.html"><i class='bx bx-log-out bx-rotate-180'></i></a></li>
    </ul>
  </header>

  <!-- Sidebar -->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user">
      <img class="app-sidebar__user-avatar" src="/admin/images/hay.jpg" width="50px" alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Ocean Buffet</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item" href="{{ route('dashboard') }}"><i class='app-menu__icon bx bx-home'></i><span class="app-menu__label">Trang chủ</span></a></li>
      <li><a class="app-menu__item" href="{{ route('san-pham') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a></li>
      <li><a class="app-menu__item" href="{{ route('nhan-vien') }}"><i class='app-menu__icon bx bx-id-card'></i><span class="app-menu__label">Quản lý người dùng</span></a></li>
      <li><a class="app-menu__item" href="{{ route('don-hang') }}"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
    </ul>
  </aside>

  <!-- Main content -->
  <main>
    @yield('content')
  </main>

  <!-- JS Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>

  <!-- DataTable init -->
  <script>
    $(document).ready(function() {
      $('#sampleTable').DataTable();
    });
  </script>

  <!-- Clock -->
  <script>
    function time() {
      const today = new Date();
      const weekday = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
      const day = weekday[today.getDay()];
      let dd = today.getDate();
      let mm = today.getMonth() + 1;
      const yyyy = today.getFullYear();
      let h = today.getHours();
      let m = today.getMinutes();
      let s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      const nowTime = `${h} giờ ${m} phút ${s} giây`;
      if (dd < 10) dd = '0' + dd;
      if (mm < 10) mm = '0' + mm;
      const fullDate = `${day}, ${dd}/${mm}/${yyyy}`;
      document.getElementById("clock").innerHTML = `<span class="date">${fullDate} - ${nowTime}</span>`;
      setTimeout(time, 1000);
    }

    function checkTime(i) {
      return i < 10 ? "0" + i : i;
    }
  </script>

  <!-- Print table -->
  <script>
    const myApp = {
      printTable: function() {
        const tab = document.getElementById('sampleTable');
        const win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();
      }
    };
  </script>

  @yield('script')
</body>
</html>
