Cài đặt thư viện QR Code:
composer require simplesoftwareio/simple-qrcode
php artisan vendor:publish --provider="SimpleSoftwareIO\QrCode\QrCodeServiceProvider"

Cài đặt PayOS:
composer require payos/payos
composer require guzzlehttp/guzzle

1. Giới thiệu dự án
Buffet Ocean là hệ thống đặt bàn buffet trực tuyến, cho phép khách hàng đặt bàn online tại nhà hoặc trực tiếp tại quán. Hệ thống bao gồm:
- Client: đặt bàn, xem thông tin buffet, thanh toán.
- Admin: quản lý sản phẩm, nhân viên, đơn đặt bàn, thống kê doanh thu.
- Bếp: xem danh sách order, cập nhật trạng thái món theo thời gian thực.

2. Công nghệ sử dụng
Laravel, MySQL, Blade, Bootstrap, PayOS, Simple QrCode

3. Phần việc đóng góp dự án
- Dashboard Admin
    + Xây dựng giao diện và chức năng dashboard admin.
    + Hiển thị các thống kê: doanh thu, số lượng order, trạng thái bàn, danh sách nhân viên.
    + Xử lý logic lấy dữ liệu theo ngày/tháng/năm.
    + Tối ưu hiển thị admin.
- Module Bếp
    + Xây dựng site bếp.
    + Hiển thị danh sách order theo thời gian thực.
    + Chức năng cập nhật trạng thái món (đang làm, hoàn thành…).
    + Đảm bảo dữ liệu đồng bộ với hệ thống admin.
- Cập nhật chức năng quản lý order
    + Thêm trường mô tả vào module quản lý order tại admin site.
    + Cập nhật migration, model, controller, giao diện hiển thị.
    + Đảm bảo trường hoạt động đúng với các chức năng.
- Đóng góp tài liệu
    + Viết báo cáo.
    + Mô tả chức năng.