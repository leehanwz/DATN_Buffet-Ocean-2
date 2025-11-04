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


    // NHÂN VIÊN & ĐƠN HÀNG
    Route::get('/nhan-vien', [NhanVienController::class, 'index'])->name('nhan-vien');
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
});

