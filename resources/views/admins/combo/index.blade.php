@extends('layouts.admins.layout-admin')

@section('title', 'Combo Buffet')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Combo Buffet</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="{{route('combo-buffet.add')}}" title="Thêm"><i class="fas fa-plus"></i>
                                Thêm combo mới</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                  class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                  class="fas fa-copy"></i> Sao chép</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                  class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                  class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>ID</th>
                                    <th>Tên Combo</th>
                                    <th>Loại</th>
                                    <th>Giá cơ bản</th>
                                    <th>Thời lượng(phút)</th>
                                    <th>Thời gian bắt đầu</th>
                                    <th>Thời gian kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($combos as $combo)
                                    <tr>
                                        <td></td>
                                        <td>{{ $combo->id }}</td>
                                        <td>{{ $combo->ten_combo }}</td>
                                        <td>{{ $combo->loai_combo ?? '—' }}</td>
                                        <td>{{ number_format($combo->gia_co_ban, 0, ',', '.') }}đ</td>
                                        <td>{{ $combo->thoi_luong_phut }}</td>
                                        <td>{{ $combo->thoi_gian_bat_dau }}</td>
                                        <td>{{ $combo->thoi_gian_ket_thuc }}</td>
                                        <td>
                                          @if($combo->trang_thai == 'Hoạt động')
                                              <span class="badge bg-success">Hoạt động</span>
                                          @elseif($combo->trang_thai == 'Tạm ngưng')
                                              <span class="badge bg-danger">Tạm ngưng</span>
                                          @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('combo-buffet.edit', $combo->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                            <form action="{{ route('combo-buffet.destroy', $combo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa combo này')">
                                                  Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!--
  MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">

    <div class="modal-body">
      <div class="row">
        <div class="form-group  col-md-12">
          <span class="thong-tin-thanh-toan">
            <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Mã sản phẩm </label>
            <input class="form-control" type="number" value="71309005">
          </div>
        <div class="form-group col-md-6">
            <label class="control-label">Tên sản phẩm</label>
          <input class="form-control" type="text" required value="Bàn ăn gỗ Theresa">
        </div>
        <div class="form-group  col-md-6">
            <label class="control-label">Số lượng</label>
          <input class="form-control" type="number" required value="20">
        </div>
        <div class="form-group col-md-6 ">
            <label for="exampleSelect1" class="control-label">Tình trạng sản phẩm</label>
            <select class="form-control" id="exampleSelect1">
              <option>Còn hàng</option>
              <option>Hết hàng</option>
              <option>Đang nhập hàng</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Giá bán</label>
            <input class="form-control" type="text" value="5.600.000">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleSelect1" class="control-label">Danh mục</label>
            <select class="form-control" id="exampleSelect1">
              <option>Bàn ăn</option>
              <option>Bàn thông minh</option>
              <option>Tủ</option>
              <option>Ghế gỗ</option>
              <option>Ghế sắt</option>
              <option>Giường người lớn</option>
              <option>Giường trẻ em</option>
              <option>Bàn trang điểm</option>
              <option>Giá đỡ</option>
            </select>
          </div>
      </div>
      <BR>
      <a href="#" style="    float: right;
    font-weight: 600;
    color: #ea0000;">Chỉnh sửa sản phẩm nâng cao</a>
      <BR>
      <BR>
      <button class="btn btn-save" type="button">Lưu lại</button>
      <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
      <BR>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!--
MODAL
-->
@endsection

{{-- <script>
  //Thời Gian
  // function time() {
  //   var today = new Date();
  //   var weekday = new Array(7);
  //   weekday[0] = "Chủ Nhật";
  //   weekday[1] = "Thứ Hai";
  //   weekday[2] = "Thứ Ba";
  //   weekday[3] = "Thứ Tư";
  //   weekday[4] = "Thứ Năm";
  //   weekday[5] = "Thứ Sáu";
  //   weekday[6] = "Thứ Bảy";
  //   var day = weekday[today.getDay()];
  //   var dd = today.getDate();
  //   var mm = today.getMonth() + 1;
  //   var yyyy = today.getFullYear();
  //   var h = today.getHours();
  //   var m = today.getMinutes();
  //   var s = today.getSeconds();
  //   m = checkTime(m);
  //   s = checkTime(s);
  //   nowTime = h + " giờ " + m + " phút " + s + " giây";
  //   if (dd < 10) {
  //     dd = '0' + dd
  //   }
  //   if (mm < 10) {
  //     mm = '0' + mm
  //   }
  //   today = day + ', ' + dd + '/' + mm + '/' + yyyy;
  //   tmp = '<span class="date"> ' + today + ' - ' + nowTime +
  //     '</span>';
  //   document.getElementById("clock").innerHTML = tmp;
  //   clocktime = setTimeout("time()", "1000", "Javascript");

  //   function checkTime(i) {
  //     if (i < 10) {
  //       i = "0" + i;
  //     }
  //     return i;
  //   }
  // }
</script> --}}

@section('script')
  <script>
      function deleteRow(r) {
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("myTable").deleteRow(i);
      }
      jQuery(function () {
          jQuery(".trash").click(function () {
              swal({
                  title: "Cảnh báo",
                  text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
                  buttons: ["Hủy bỏ", "Đồng ý"],
              })
                  .then((willDelete) => {
                      if (willDelete) {
                          swal("Đã xóa thành công.!", {

                          });
                      }
                  });
          });
      });
      oTable = $('#sampleTable').dataTable();
      $('#all').click(function (e) {
          $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
          e.stopImmediatePropagation();
      });
  </script>
@endsection
