<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginController;



Route::middleware(['auth'])->get('/', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


//////////Auth
Route::namespace('Auth')->group(function () {
    //login admin
    Route::get('/login', [LoginController::class, 'index'])->name('login-index');
    Route::post('/login', [LoginController::class, 'login'])->name('login-user');
    Route::get('/captcha', [LoginController::class, 'getCaptcha'])->name('getCaptcha');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin-logout');

});


// require __DIR__.'/auth.php';
