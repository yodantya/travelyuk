<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ManajemenRuteController;
use App\Http\Controllers\Admin\ManajemenPesananController;
use App\Http\Controllers\Admin\LaporanPesananController;
use App\Http\Controllers\Admin\ManajemenPenggunaController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserPesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [UserHomeController::class, 'index']);
Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/pesanansaya', [UserPesananController::class, 'index'])->name('user.pesanansaya');
    Route::get('/pesan/{id}', [UserPesananController::class, 'create'])->name('user.pesanan');
    Route::post('/pesan/{id}', [UserPesananController::class, 'store'])->name('user.pesanan.store');

    Route::get('/pesanan/{id}', [UserPesananController::class, 'lihat'])->name('user.pesanan.lihat');
    Route::get('/pesanan/{id}/pembayaran', [UserPesananController::class, 'payment'])->name('user.pesanan.pembayaran');
    Route::post('/pesanan/{id}/pembayaran', [UserPesananController::class, 'uploadPayment'])->name('user.pesanan.pembayaran.upload');
    Route::get('/invoice/{id}', [UserPesananController::class, 'lihatinvoice'])->name('user.pesanan.invoice');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('/rute', ManajemenRuteController::class)->names('admin.rute');
    Route::resource('/pengguna', ManajemenPenggunaController::class)->names('admin.pengguna');

    Route::get('/adminpesanan', [ManajemenPesananController::class, 'index'])->name('admin.pesanan');
    Route::post('/adminpesanan/{id}/approve', [ManajemenPesananController::class, 'approve'])->name('admin.pesanan.approve');
    Route::post('/adminpesanan/{id}/reject', [ManajemenPesananController::class, 'reject'])->name('admin.pesanan.reject');

    Route::get('/laporan', [LaporanPesananController::class, 'index'])->name('admin.laporan');
    Route::get('/laporandetail/{id}', [LaporanPesananController::class, 'detail'])->name('admin.laporan.detail');
});

