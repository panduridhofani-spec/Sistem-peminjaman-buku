<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('Home');
});

Route::get('/tentang_kami', function () {
    return view('tentang_kami');
});

Route::get('/daftar', function () {
    return view('auth.daftar');
});

Route::get('/masuk', function () {
    return view('auth.masuk');
})->name('login');

Route::get('/lupa_password', function () {
    return view('auth.lupa_password');
});

Route::get('/verifikasi', function () {
    return view('auth.verifikasi');
});

Route::get('/atur_pw_baru', function () {
    return view('auth.atur_pw_baru');
});

// ADMIN SIDE
// Route::middleware(['auth'])->prefix('admin')->group(function () {
Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');

});
