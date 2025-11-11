<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\MonTrongComboController;
use App\Http\Controllers\Admin\KhuVucController;
use App\Http\Controllers\Admin\BanAnController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\MonAnController;
use App\Http\Controllers\Admin\ComboBuffetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DatBanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== CLIENT SITE ====================
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //     Route::get('/about', [AboutController::class, 'index'])->name('about');
    //     Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    //     Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    //     Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    //     Route::get('/service', [ServiceController::class, 'index'])->name('service');
    //     Route::get('/team', [TeamController::class, 'index'])->name('team');
    //     Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
});


// ==================== ADMIN SITE ====================
Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // SẢN PHẨM & MÓN ĂN
    Route::resource('danh-muc', DanhMucController::class);
    Route::resource('san-pham', SanPhamController::class);
    Route::resource('mon-trong-combo', MonTrongComboController::class);

    // ==========================================================
    // SỬA LỖI & ĐỒNG BỘ:
    // Xóa 6 dòng thủ công, thay bằng 1 dòng Route::resource
    // ==========================================================
    Route::resource('combo-buffet', ComboBuffetController::class);


    // NHÂN VIÊN 
    Route::prefix('nhan-vien')->name('nhan-vien.')->controller(NhanVienController::class)->group(function () {

        // Hiển thị danh sách
        Route::get('/', 'index')->name('index');
    
        // Thêm mới
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store'); // POST /nhan-vien
    
        // Sửa
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update'); // PUT /nhan-vien/{id}
    
        // Xóa
        Route::delete('/{id}', 'destroy')->name('destroy'); // DELETE /nhan-vien/{id}
    
        // Cập nhật trạng thái (AJAX hoặc patch)
        Route::patch('/{id}/trang-thai', 'capNhatTrangThai')->name('cap-nhat-trang-thai');
    
        // Reset mật khẩu
        Route::post('/{id}/reset-mat-khau', 'resetMatKhau')->name('reset-mat-khau');
    
    });
    // ĐƠN HÀNG
    Route::get('/don-hang', [DonHangController::class, 'index'])->name('don-hang');

    // KHU VỰC & BÀN ĂN
    Route::get('/khu-vuc-ban-an', [KhuVucController::class, 'showManagementPage'])
        ->name('khu-vuc-ban-an');

    Route::prefix('khu-vuc')->name('khu-vuc.')->controller(KhuVucController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
        Route::patch('/{id}/trang-thai', 'capNhatTrangThai')->name('cap-nhat-trang-thai');
    });

    Route::prefix('ban-an')->name('ban-an.')->controller(BanAnController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
        Route::post('/{id}/regenerate-qr', 'regenerateQr')->name('qr');
        Route::patch('/{id}/trang-thai', 'capNhatTrangThai')->name('cap-nhat-trang-thai');
    });
    // 💡 === AJAX ROUTE (Lấy bàn trống theo giờ) ===
    Route::get('/ajax/get-available-tables', [BanAnController::class, 'ajaxGetAvailableTables'])
        ->name('ajax.get-available-tables');


    // 💡 === CRUD CHO ĐẶT BÀN ===
    Route::prefix('dat-ban')->name('dat-ban.')->controller(DatBanController::class)->group(function () {
    });
    // 💡 === CRUD CHO ĐẶT BÀN ===
    Route::prefix('dat-ban')->name('dat-ban.')->controller(DatBanController::class)->group(function () {
        Route::get('/', 'index')->name('index'); 
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
        Route::post('/{id}/update-status', 'updateStatus')->name('updateStatus');
    });
    
    
});

