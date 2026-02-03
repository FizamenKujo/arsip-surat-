<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin only
    Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'petugas']); // Add middleware later if needed

    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
});
