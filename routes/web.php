<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KhuVucController;
use App\Http\Controllers\Admin\BanAnController;

// shop
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
// === NHÓM ADMIN (SỬ DỤNG CHUNG PREFIX 'admin') ===
// =====================================================================
Route::prefix('admin')->group(function () {

    // Các route admin cũ
    Route::get('/dashboard', function () {
        return view('admins.dashboard');
    })->name('dashboard');

    Route::get('/san-pham', function () {
        return view('admins.san-pham');
    })->name('san-pham');

    Route::get('/form-add-san-pham', function () {
        return view('admins.form-add-san-pham');
    })->name('form-add-san-pham');

    Route::get('/nhan-vien', function () {
        return view('admins.nhan-vien');
    })->name('nhan-vien');

    Route::get('/don-hang', function () {
        return view('admins.don-hang');
    })->name('don-hang');

    // --- ROUTE QUẢN LÝ KHU VỰC VÀ BÀN ĂN (SSR) ---
    
    // 1. READ (Hiển thị trang danh sách)
    Route::get('/khu-vuc-ban-an', [KhuVucController::class, 'showManagementPage'])
        ->name('khu-vuc-ban-an');

    // 2. CRUD CHO KHU VỰC (Sử dụng prefix 'khu-vuc' và name 'khu-vuc.')
    Route::prefix('khu-vuc')->name('khu-vuc.')->controller(KhuVucController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
    });

    // 3. CRUD CHO BÀN ĂN (Sử dụng prefix 'ban-an' và name 'ban-an.')
    Route::prefix('ban-an')->name('ban-an.')->controller(BanAnController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/delete', 'destroy')->name('destroy');
        Route::post('/{id}/regenerate-qr', 'regenerateQr')->name('qr');
    });

}); // Kết thúc nhóm prefix('admin')

// =====================================================================
// === AUTH ===
// =====================================================================
Route::get('/auth/login', function () {
    return view('auths.login');
})->name('login');

Route::get('/auth/forgot', function () {
    return view('auths.forgot');
})->name('forgot');

