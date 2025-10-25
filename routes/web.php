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

// admin
Route::get('/admin/dashboard', function () {
    return view('admins.dashboard');
})->name('dashboard');

Route::get('/admin/san-pham', function () {
    return view('admins.san-pham');
})->name('san-pham');

Route::get('/admin/form-add-san-pham', function () {
    return view('admins.form-add-san-pham');
})->name('form-add-san-pham');

Route::get('/admin/nhan-vien', function () {
    return view('admins.nhan-vien');
})->name('nhan-vien');

Route::get('/admin/don-hang', function () {
    return view('admins.don-hang');
})->name('don-hang');

// ROUTE QUẢN LÝ KHU VỰC VÀ BÀN ĂN (SSR)
// 1. READ (Hiển thị trang danh sách)
Route::get('/admin/khu-vuc-ban-an', [KhuVucController::class, 'showManagementPage'])
    ->name('khu-vuc-ban-an');

// 2. CRUD CHO KHU VỰC
Route::get('/admin/khu-vuc/create', [KhuVucController::class, 'create'])
    ->name('khu-vuc.create');
Route::post('/admin/khu-vuc/store', [KhuVucController::class, 'store'])
    ->name('khu-vuc.store');
Route::get('/admin/khu-vuc/{id}/edit', [KhuVucController::class, 'edit'])
    ->name('khu-vuc.edit');
Route::post('/admin/khu-vuc/{id}/update', [KhuVucController::class, 'update'])
    ->name('khu-vuc.update');
Route::post('/admin/khu-vuc/{id}/delete', [KhuVucController::class, 'destroy'])
    ->name('khu-vuc.destroy');

// 3. CRUD CHO BÀN ĂN
Route::get('/admin/ban-an/create', [BanAnController::class, 'create'])
    ->name('ban-an.create');
Route::post('/admin/ban-an/store', [BanAnController::class, 'store'])
    ->name('ban-an.store');
Route::get('/admin/ban-an/{id}/edit', [BanAnController::class, 'edit'])
    ->name('ban-an.edit');
Route::post('/admin/ban-an/{id}/update', [BanAnController::class, 'update'])
    ->name('ban-an.update');
Route::post('/admin/ban-an/{id}/delete', [BanAnController::class, 'destroy'])
    ->name('ban-an.destroy');
Route::post('/admin/ban-an/{id}/regenerate-qr', [BanAnController::class, 'regenerateQr'])
    ->name('ban-an.qr');

// auth
Route::get('/auth/login', function () {
    return view('auths.login');
})->name('login');

Route::get('/auth/forgot', function () {
    return view('auths.forgot');
})->name('forgot');