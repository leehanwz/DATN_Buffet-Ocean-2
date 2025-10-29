<?php

use Illuminate\Support\Facades\Route;

// === Controllers ===
use App\Http\Controllers\Admin\KhuVucController;
use App\Http\Controllers\Admin\BanAnController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\MonTrongComboController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =S===================================================================
// === SHOP (TRANG NGƯỜI DÙNG) ===
// =====================================================================
// (Giữ nguyên)
Route::get('/', function () {
    return view('restaurants.home');
})->name('home');

Route::get('/about', function () {
    return view('restaurants.about');
})->name('about');

Route::get('/contact', function () {
    return view('restaurants.contact');
})->name('contact');

Route::get('/booking', function () {
    return view('restaurants.booking');
})->name('booking');

Route::get('/menu', function () {
    return view('restaurants.menu');
})->name('menu');

Route::get('/service', function () {
    return view('restaurants.service');
})->name('service');

Route::get('/team', function () {
    return view('restaurants.team');
})->name('team');

Route::get('/testimonial', function () {
    return view('restaurants.testimonial');
})->name('testimonial');

// =====================================================================
// === NHÓM ADMIN (PREFIX: /admin) ===
// =====================================================================

// *** THAY ĐỔI QUAN TRỌNG: Đã thêm ->name('admin.') ***
Route::prefix('admin')->name('admin.')->group(function () {

    // --- Dashboard ---
    Route::get('/dashboard', function () {
        return view('admins.dashboard');
    })->name('dashboard'); // Tên mới: 'admin.dashboard'

    // --- Sản Phẩm ---
    Route::get('/san-pham', function () {
        return view('admins.san-pham');
    })->name('san-pham'); // Tên mới: 'admin.san-pham'

    Route::get('/form-add-san-pham', function () {
        return view('admins.form-add-san-pham');
    })->name('form-add-san-pham'); // Tên mới: 'admin.form-add-san-pham'
    
    Route::post('/san-pham/store', [SanPhamController::class, 'store'])->name('san-pham.store'); // Tên mới: 'admin.san-pham.store'

    // --- Nhân Viên ---
    Route::get('/nhan-vien', function () {
        return view('admins.nhan-vien');
    })->name('nhan-vien'); // Tên mới: 'admin.nhan-vien'

    // --- Đơn Hàng ---
    Route::get('/don-hang', function () {
        return view('admins.don-hang');
    })->name('don-hang'); // Tên mới: 'admin.don-hang'
    
    // --- Món Trong Combo (Resource) ---
    Route::resource('mon-trong-combo', MonTrongComboController::class); // Tên mới: 'admin.mon-trong-combo.index', 'admin.mon-trong-combo.create', ...

    // --- Quản lý Khu Vực & Bàn Ăn ---
    Route::get('/khu-vuc-ban-an', [KhuVucController::class, 'showManagementPage'])
        ->name('khu-vuc-ban-an'); // Tên mới: 'admin.khu-vuc-ban-an'

    // --- CRUD Khu Vực ---
    Route::prefix('khu-vuc')->name('khu-vuc.')->controller(KhuVucController::class)->group(function () {
        Route::get('/create', 'create')->name('create'); // Tên mới: 'admin.khu-vuc.create'
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
        Route::patch('/{id}/trang-thai', 'capNhatTrangThai')->name('cap-nhat-trang-thai');
    });

    // --- CRUD Bàn Ăn ---
    Route::prefix('ban-an')->name('ban-an.')->controller(BanAnController::class)->group(function () {
        Route::get('/create', 'create')->name('create'); // Tên mới: 'admin.ban-an.create'
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
        Route::post('/{id}/regenerate-qr', 'regenerateQr')->name('qr');
        Route::patch('/{id}/trang-thai', 'capNhatTrangThai')->name('cap-nhat-trang-thai');
    });

}); // Kết thúc nhóm prefix('admin')

// =====================================================================
// === AUTH (PREFIX: /auth) ===
// =====================================================================
// (Giữ nguyên)
Route::prefix('auth')->name('auth.')->group(function () {
    
    Route::get('/login', function () {
        return view('auths.login');
    })->name('login');

    Route::get('/forgot', function () {
        return view('auths.forgot');
    })->name('forgot');

    // Route::post('/login', [LoginController::class, 'login']);
});