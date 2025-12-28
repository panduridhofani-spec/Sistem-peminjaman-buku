<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\BukuController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PembayaranController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/tentang_kami', function () {return view('tentang_kami');});

Route::get('/daftar', function () {return view('auth.daftar');});

Route::get('/masuk ', function () {return view('auth.masuk');});

Route::get('/lupa_password', function () {return view('auth.lupa_password');});

Route::get('/verifikasi', function () {return view('auth.verifikasi');});

Route::get('/atur_pw_baru', function () {return view('auth.atur_pw_baru');});

Route::get('/dashboard_after_login', function () {return view('after-login.dashboard_after_login');});

Route::get('/profil', function () {return view('after-login.profil');});

Route::get('/tentang_kami_after_login', function () {return view('after-login.tentang_kami_after_login');});

Route::get('/edit_profil', function () {return view('after-login.edit_profil');});

Route::get('/daftar_alamat', function () {return view('after-login.daftar_alamat');});

Route::get('/tambah_alamat', function () {return view('after-login.tambah_alamat');});

Route::get('/edit_alamat', function () {return view('after-login.edit_alamat');});

Route::get('/keranjang', function () {return view('after-login.keranjang');});

Route::get('/daftar_alamat_keranjang', function () {return view('after-login.daftar_alamat_keranjang');});

Route::get('/tambah_alamat_keranjang', function () {return view('after-login.tambah_alamat_keranjang');});

Route::get('/checkout', function () {return view('after-login.checkout');});

Route::get('/pembayaran_belum_dibayar', function () {return view('after-login.pembayaran_belum_dibayar');});

Route::get('/pembayaran_sudah_dibayar', function () {return view('after-login.pembayaran_sudah_dibayar');});

// =====================================================================================================================
// ADMIN SIDE
// Route::middleware(['auth'])->prefix('admin')->group(function () {
Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('buku', [BukuController::class, 'index']) ->name('buku.index');
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('buku/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('user', [UserController::class, 'index']) ->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');

    
});