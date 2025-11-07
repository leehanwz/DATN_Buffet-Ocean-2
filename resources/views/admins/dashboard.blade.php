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
        <div class="widget-small primary coloured-icon">
          <i class='icon bx bxs-user-account fa-3x'></i>
          <div class="info">
            <h4>Tổng khách hàng</h4>
            <p><b>{{ $tongKhach }} khách hàng</b></p>
            <p class="info-tong">
              Tỉ lệ khách hàng quay lại: 
              <b class="{{ $tiLeQuayLai >= 50 ? 'text-success' : 'text-danger' }}">
                {{ $tiLeQuayLai }}%
              </b>
            </p>
          </div>
        </div>
      </div>

    
       <!-- col-6 -->
        <div class="col-md-6">
          <div class="widget-small info coloured-icon">
            <i class='icon bx bxs-bowl-hot fa-3x'></i>
            <div class="info">
              <h4>Tổng món ăn</h4>
              <p><b>{{ $tongMonAn }} món</b></p>
              <p class="info-tong">Tổng số món ăn hiện có trong combo.</p>
            </div>
          </div>
        </div>

           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small danger coloured-icon">
              <i class='icon bx bxs-cart-add fa-3x'></i>
              <div class="info">
                <h4>Tổng lượt bán</h4>
                <p><b>{{ $tongDonHang }} lượt</b></p>
                <p class="info-tong">Tổng số lượt combo buffet được bán ra.</p>
              </div>
            </div>
          </div>

           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small danger coloured-icon">
              <i class='icon bx bxs-cart-add fa-3x'></i>
              <div class="info">
                <h4>Tổng doanh thu</h4>
                <p><b>{{ number_format($tongDoanhThu, 0, ',', '.') }} đ</b></p>
                <p class="info-tong">Tổng doanh thu của nhà hàng.</p>
              </div>
            </div>
          </div>

           <!-- col-12 -->
           <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Combo buffet bán chạy</h3>
              <div>
                <table class="table table-bordered text-center align-middle">
                  <thead class="table-dark">
                      <tr>
                          <th>Top</th>
                          <th>Tên combo</th>
                          <th>Số lượt bán</th>
                          <th>Tổng doanh thu</th>
                          <th>Tỷ lệ đặt</th>
                          <th>Tỷ lệ hủy</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($comboBanChay as $index => $combo)
                        <tr>
                          <td>#{{ $index + 1 }}</td>
                          <td><strong>{{ $combo->ten_combo }}</strong></td>
                          <td>
                              {{ $combo->so_luot_ban }} lượt
                              <div class="progress mt-1">
                                  <div class="progress-bar bg-success" role="progressbar"
                                      style="width: {{ ($combo->so_luot_ban / $comboBanChay->max('so_luot_ban')) * 100 }}%">
                                  </div>
                              </div>
                          </td>
                          <td class="text-success fw-bold">{{ number_format($combo->tong_doanh_thu, 0, ',', '.') }} đ</td>
                          <td class="fw-semibold text-primary">{{ $combo->ti_le_dat }}%</td>
                          <td class="fw-semibold text-danger">{{ $combo->ti_le_huy }}%</td>
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
                <h3 class="tile-title">Khách hàng tiềm năng</h3>
                <div>
                  <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                      <tr>
                        <th>Top</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Số lần đặt</th>
                        <th>Tổng chi tiêu</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($topKhachHang as $index => $kh)
                        <tr>
                          <td>#{{ $index + 1 }}</td>
                          <td><strong>{{ $kh->ten_khach }}</strong></td>
                          <td>{{ $kh->sdt_khach }}</td>
                          <td>
                            {{ $kh->so_lan_dat }} lần
                            <div class="progress mt-1">
                              <div class="progress-bar bg-info" role="progressbar"
                                  style="width: {{ ($kh->so_lan_dat / $topKhachHang->max('so_lan_dat')) * 100 }}%">
                              </div>
                            </div>
                          </td>
                          <td class="text-success fw-bold">{{ number_format($kh->tong_chi_tieu, 0, ',', '.') }} đ</td>
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
          <!-- Line Chart: tổng doanh thu -->
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Doanh thu tổng của nhà hàng</h3>
              <select id="filterTotal" class="form-select form-select-sm mb-2">
                <option value="day">7 ngày gần nhất</option>
                <option value="month" selected>12 tháng gần nhất</option>
                <option value="year">5 năm gần nhất</option>
              </select>
              <canvas id="lineChart"></canvas>
            </div>
          </div>

          <!-- Bar Chart: doanh thu theo loại combo -->
          <div class="col-md-12 mt-3">
            <div class="tile">
              <h3 class="tile-title">Doanh thu các loại combo</h3>
              <select id="filterCombo" class="form-select form-select-sm mb-2">
                <option value="day">7 ngày gần nhất</option>
                <option value="month" selected>12 tháng gần nhất</option>
                <option value="year">5 năm gần nhất</option>
              </select>
              <canvas id="barChart"></canvas>
            </div>
          </div>

          <!-- Biểu đồ khung giờ bán chạy & ngày trong tuần -->
          <div class="col-md-12 mt-3">
            <div class="tile">
              <h3 class="tile-title">Thống kê khung giờ bán chạy</h3>
              <canvas id="hourChart"></canvas>
            </div>
          </div>

          <div class="col-md-12 mt-3">
            <div class="tile">
              <h3 class="tile-title">Thống kê ngày trong tuần bán chạy</h3>
              <canvas id="weekdayChart"></canvas>
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
          </script> Phần mềm quản lý bán hàng | Dev By Trường
        </b></p>
    </div>
  </main>
@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let lineChart, barChart, hourChart, weekChart;

    // Hàm fetch dữ liệu từ backend
    function fetchData(filterTotal, filterCombo) {
        fetch(`/admin/dashboard/data?filter=${filterTotal}`)
        .then(res => res.json())
        .then(res => {
            // === Biểu đồ 1: Tổng doanh thu (Line) ===
            if(lineChart) lineChart.destroy();
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            lineChart = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: res.totalLabels,
                    datasets: [{
                        label: 'Doanh thu tổng',
                        data: res.totalData,
                        borderColor: 'rgb(54, 162, 235)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: true } },
                    scales: {
                        y: { beginAtZero: true, ticks: { callback: v => v.toLocaleString() + '₫' } }
                    }
                }
            });

            // === Biểu đồ 2: Doanh thu theo combo (Bar) ===
            if(barChart) barChart.destroy();
            const ctxBar = document.getElementById('barChart').getContext('2d');
            barChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: res.comboLabels,
                    datasets: [{
                        label: 'Doanh thu theo loại combo',
                        data: res.comboData,
                        backgroundColor: ['#FF6384','#36A2EB','#FFCE56','#4BC0C0']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: true } },
                    scales: {
                        y: { beginAtZero: true, ticks: { callback: v => v.toLocaleString() + '₫' } }
                    }
                }
            });

            // === Biểu đồ 3: Khung giờ bán chạy ===
            if(hourChart) hourChart.destroy();
            const ctxHour = document.getElementById('hourChart').getContext('2d');
            hourChart = new Chart(ctxHour, {
                type: 'bar',
                data: {
                    labels: Array.from({length: 13}, (_, i) => `${i + 10}h`),
                    datasets: [{
                        label: 'Số lượt đặt',
                        data: Object.values(res.hourlyData),
                        backgroundColor: '#36A2EB',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            // === Biểu đồ 4: Ngày trong tuần bán chạy ===
            if(weekChart) weekChart.destroy();
            const ctxWeek = document.getElementById('weekdayChart').getContext('2d');
            weekChart = new Chart(ctxWeek, {
                type: 'bar',
                data: {
                    labels: Object.keys(res.weekdayData),
                    datasets: [{
                        label: 'Số lượt đặt',
                        data: Object.values(res.weekdayData),
                        backgroundColor: '#FFCE56',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    }

    // Khởi tạo chart ban đầu
    fetchData('month', 'month');

    // Lắng nghe thay đổi filter
    document.getElementById('filterTotal').addEventListener('change', e => {
        fetchData(e.target.value, document.getElementById('filterCombo').value);
    });
    document.getElementById('filterCombo').addEventListener('change', e => {
        fetchData(document.getElementById('filterTotal').value, e.target.value);
    });
  </script>
@endsection

