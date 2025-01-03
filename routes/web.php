<?php

use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Koneksi berhasil!';
    } catch (\Exception $e) {
        return 'Koneksi gagal: ' . $e->getMessage();
    }
});

Route::get('/register', [SesiController::class, 'showRegistration'])->name('registration.show');
Route::post('/register', [SesiController::class, 'submitRegistration'])->name('registration.submit');
Route::get('/login', [SesiController::class, 'showLogin'])->name('login');
Route::post('/login', [SesiController::class, 'submitLogin'])->name('submitLogin');
Route::get('dashboard',[SesiController::class,'dashboard']);
