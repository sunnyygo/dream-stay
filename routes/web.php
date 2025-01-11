<?php

use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\OrderController;
use App\Models\Room;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AdminController;

Route::get('/', [RoomController::class, 'home'])->name('home');

Route::get('/booking', function () {
    return view('home');
});

Route::get('/register', [SesiController::class, 'showRegistration'])->name('registration.show');
Route::post('/register', [SesiController::class, 'submitRegistration'])->name('registration.submit');

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [SesiController::class, 'showLogin'])->name('login');
    Route::post('/login', [SesiController::class, 'submitLogin'])->name('submitLogin');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard/admin',[SesiController::class,'dashboardAdmin']);
    Route::get('/dashboard/logout',[SesiController::class,'logoutAdmin'])->name('dashboard.logout');
});


Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');
Route::get('/payment/{id}', [OrderController::class, 'payment'])->name('payment.show');
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);
Route::post('/payment-submit', [OrderController::class, 'submitPayment'])->name('payment.submit');


Route::post('/available-rooms', [RoomController::class, 'showAvailableRooms'])->name('rooms.available');
Route::get('/cancel-order/{id}', [OrderController::class, 'cancelOrder'])->name('cancel.order');
Route::delete('/order/cancel/{id}', [OrderController::class, 'cancelOrder'])->name('order.cancel');


Route::get('image', [ImageController::class, 'create'])->name('images.create');
Route::post('imagess', [ImageController::class, 'store'])->name('images.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::resource('admins', AdminController::class)->except(['show']);
});


