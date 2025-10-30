<?php

use Illuminate\Support\Facades\Route;

// ======================= SHOP (CLIENT) =========================
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\MenuController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\TeamController;
use App\Http\Controllers\Client\TestimonialController;

// ======================= ADMIN =========================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\MonTrongComboController;
use App\Http\Controllers\Admin\KhuVucController;
use App\Http\Controllers\Admin\BanAnController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\MonAnController;

// ======================= AUTH =========================
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
    // ================= DASHBOARD =================
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ================= SẢN PHẨM =================
    Route::resource('danh-muc', DanhMucController::class);
    Route::resource('san-pham', SanPhamController::class);

    // ================= NHÂN VIÊN =================
    Route::get('/nhan-vien', [NhanVienController::class, 'index'])->name('nhan-vien');

    // ================= ĐƠN HÀNG =================
    Route::get('/don-hang', [DonHangController::class, 'index'])->name('don-hang');

    // ================= MÓN TRONG COMBO =================
    Route::resource('mon-trong-combo', MonTrongComboController::class);

    // ================= KHU VỰC =================
    Route::resource('khu-vuc', KhuVucController::class);
    Route::patch('khu-vuc/{id}/trang-thai', [KhuVucController::class, 'capNhatTrangThai'])
        ->name('khu-vuc.cap-nhat-trang-thai');

    // ================= BÀN ĂN =================
    Route::resource('ban-an', BanAnController::class);
    Route::patch('ban-an/{id}/trang-thai', [BanAnController::class, 'capNhatTrangThai'])
        ->name('ban-an.cap-nhat-trang-thai');
    Route::post('admin/ban-an/{id}/qr', [BanAnController::class, 'regenerateQr'])->name('ban-an.qr');


    // ================= KHU VỰC & BÀN ĂN =================
    Route::get('khu-vuc-ban-an', [KhuVucController::class, 'index'])->name('khu-vuc-ban-an');
});


// // ==================== AUTH ====================
// Route::prefix('auth')->name('auth.')->group(function () {
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::get('/forgot', [ForgotPasswordController::class, 'showForgotForm'])->name('forgot');
// });
