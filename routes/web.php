<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ComboBuffetController;

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

// combo buffet
Route::get('/admin/combo-buffet', [ComboBuffetController::class, 'index'])->name('combo-buffet.index');
Route::get('/admin/combo-buffet/add', [ComboBuffetController::class, 'create'])->name('combo-buffet.add');
Route::post('/admin/combo-buffet/store', [ComboBuffetController::class, 'store'])->name('combo-buffet.store');
Route::get('/admin/combo-buffet/{id}/edit', [ComboBuffetController::class, 'edit'])->name('combo-buffet.edit');
Route::put('/admin/combo-buffet/{id}/update', [ComboBuffetController::class, 'update'])->name('combo-buffet.update');
Route::delete('/admin/combo-buffet/{id}/destroy', [ComboBuffetController::class, 'destroy'])->name('combo-buffet.destroy');

// auth
Route::get('/auth/login', function () {
    return view('auths.login');
})->name('login');

Route::get('/auth/forgot', function () {
    return view('auths.forgot');
})->name('forgot');