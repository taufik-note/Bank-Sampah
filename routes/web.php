<?php

use App\Http\Controllers\DropPointController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Root akan redirect ke dashboard, atau login jika belum autentikasi
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Halaman dashboard setelah login, pakai DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Group route yang membutuhkan autentikasi user
Route::middleware(['auth'])->group(function () {
    Route::resource('drop-points', DropPointController::class);
    Route::resource('transactions', TransactionController::class);
});

// Include route autentikasi Laravel Breeze (login, register, logout)
require __DIR__ . '/auth.php';
