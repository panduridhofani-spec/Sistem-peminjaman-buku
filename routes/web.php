<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\BukuuController;



/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('Home');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
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

/*
|--------------------------------------------------------------------------
| DETAIL BUKU (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/buku/{id}', [BukuuController::class, 'detail'])
    ->name('detail_buku_public');


/*
|--------------------------------------------------------------------------
| DETAIL BUKU - AFTER LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/buku-after-login/{id}', [BukuController::class, 'detailAfterLogin'])
    ->name('detail_buku_after_login');


// tentang kami
Route::get('/tentang-kami-login', function () {
    return view('tentang-kami');
    // return view('after-login.tentang_kami_after_login');
});

Route::get('/tentang-kami', function () {
    return view('after-login.tentang-kami');
    // return view('after-login.tentang_kami_after_login');
});

/*
|--------------------------------------------------------------------------
| AFTER LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('after-login.dashboard_after_login');
});

Route::get('/profil', function () {
    return view('after-login.profil');
});

Route::get('/edit_profil', function () {
    return view('after-login.edit_profil');
});

/* ALAMAT */
Route::get('/alamat', function () {
    return view('after-login.daftar_alamat');
});

Route::get('/tambah-alamat', function () {
    return view('after-login.tambah-alamat');
});

Route::get('/edit_alamat/{id}', function ($id) {
    return view('after-login.edit_alamat', compact('id'));
});

/* TRANSAKSI */
Route::get('/keranjang', function () {
    return view('after-login.keranjang');
});

Route::get('/checkout', function () {
    return view('after-login.checkout');
});

Route::get('/pembayaran', function () {
    return view('after-login.pembayaran_belum_dibayar');
});

Route::get('/pembayaran_sudah_dibayar', function () {
    return view('after-login.pembayaran_sudah_dibayar');
});

/* DETAIL */
Route::get('/dashboard/buku/{id}', [BukuController::class, 'detailAfterLogin'])
    ->name('detail_buku_after_login');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // DASHBOARD
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    // ================= BUKU =================
    Route::get('buku', function () {
        return view('admin.buku.index');
    })->name('buku.index');

    Route::get('buku/create', function () {
        return view('admin.buku.create');
    })->name('buku.create');

    Route::get('buku/{id}', function ($id) {
        return view('admin.buku.edit', compact('id'));
    })->name('buku.edit');


    // ================= USER =================
    Route::get('user', function () {
        return view('admin.user.index');
    })->name('user.index');

    Route::get('user/create', function () {
        return view('admin.user.create');
    })->name('user.create');

    Route::get('user/{id}', function ($id) {
        return view('admin.user.edit', compact('id'));
    })->name('user.edit');


    // ================= BOOKING =================
    Route::get('booking', function () {
        return view('admin.booking.index');
    })->name('booking.index');


    // ================= PROFIL =================
    Route::get('profil', function () {
        return view('admin.profil');
    })->name('profil.index');
});
