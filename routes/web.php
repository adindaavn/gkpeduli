<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\CatatanPerjalananController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthMiddleware;


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('cek-login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('cek-register', [AuthController::class, 'checkRegister'])->name('cek-register');

Route::group(['middleware' => AuthMiddleware::class], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('penduduk', PendudukController::class);
    Route::delete('cek-penduduk', [PendudukController::class, 'store']);
    Route::resource('catatan', CatatanPerjalananController::class);
});

