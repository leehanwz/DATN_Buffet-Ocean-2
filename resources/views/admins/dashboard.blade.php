@extends('layouts.admins.layout-admin')

@section('title', 'Dashboard')

@section('content')
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Left-->
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                            <div class="info">
                                <h4>Tổng khách hàng</h4>
                                <p><b>{{ $tongNhanVien }} nhân viên</b></p>
                                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                            <div class="info">
                                <h4>Tổng sản phẩm</h4>
                                <p><b>{{ $tongMonAn }} sản phẩm</b></p>
                                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                            <div class="info">
                                <h4>Tổng đơn hàng</h4>
                                <p><b>{{ $tongDonHang }} đơn hàng</b></p>
                                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                            <div class="info">
                                <h4>Sắp hết hàng</h4>
                                <p><b>{{ $monHetHang }} sản phẩm</b></p>
                                <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Tình trạng đơn hàng</h3>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID đơn hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Phương thức TT</th>
                                            <th>Đã thanh toán</th>
                                            <th>Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donHangMoi as $don)
                                            <tr>
                                                <td>{{ $don->id }}</td>
                                                <td>{{ $don->datBan->ten_khach ?? 'Ẩn' }}</td>
                                                <td>{{ number_format($don->tong_tien) }} đ</td>
                                                <td>
                                                    <span class="badge bg-info">{{ $don->trang_thai ?? 'Chưa rõ' }}</span>
                                                </td>
                                                <td>{{ $don->phuong_thuc_tt ?? '---' }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $don->da_thanh_toan ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $don->da_thanh_toan ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                                                    </span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($don->created_at)->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- / div trống-->
                        </div>
                    </div>
                    <!-- / col-12 -->
                    <!-- col-12 -->
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Nhân viên mới</h3>
                            <div style="overflow-x: auto">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Vai trò</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nhanVienMoi as $nv)
                                            <tr>
                                                <td>#{{ $nv->id }}</td>
                                                <td>{{ $nv->ho_ten ?? 'Ẩn' }}</td>
                                                </td>
                                                <td><span class="tag tag-success">{{ $nv->sdt ?? '---' }}</span></td>
                                                <td>{{ ucfirst($nv->vai_tro) }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $nv->trang_thai === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ $nv->trang_thai === 'active' ? 'Hoạt động' : 'Ngưng hoạt động' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- / col-12 -->
                </div>
            </div>
            <!--END left-->
            <!--Right-->
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Dữ liệu 6 tháng đầu vào</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--END right-->
        </div>


        <div class="text-center" style="font-size: 13px">
            <p><b>Copyright
                    <script type="text/javascript">
                        document.write(new Date().getFullYear());
                    </script> Phần mềm quản lý bán hàng | This site dev by PH55158
                </b></p>
        </div>
    </main>
@endsection

@section('script')
    {{-- Thêm thư viện Chart.js nếu layout không load được --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Script vẽ biểu đồ --}}
    <script>
        const doanhThuData = @json(array_values($doanhThuTheoThang));
        const datBanData = @json(array_values($luotDatBanTheoThang));
        const labels = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"];

        new Chart(document.getElementById("lineChartDemo"), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Lượt đặt bàn",
                    data: datBanData,
                    borderColor: "rgb(255, 213, 59)",
                    backgroundColor: "rgba(255, 213, 59, 0.5)",
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { title: { display: false } }
                }
            }
        });

        new Chart(document.getElementById("barChartDemo"), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Doanh thu (VNĐ)",
                    data: doanhThuData,
                    backgroundColor: "rgba(9, 109, 239, 0.6)",
                    borderColor: "rgb(9, 109, 239)",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { title: { display: false } }
                }
            }
        });
    </script>
@endsection