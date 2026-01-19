<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\PesananController;
use App\Http\Controllers\Api\KeranjangController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan; // ✅ INI WAJIB



/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp']);
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

/* PUBLIC BUKU */
Route::prefix('buku')->group(function () {
    Route::get('/', [BukuController::class, 'index']);
    Route::get('/{id}', [BukuController::class, 'show']);
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum'])->group(function () {

    /* AUTH */
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:user')->group(function () {

        /* PROFILE */
        Route::prefix('profile')->group(function () {

            Route::get('/', [ProfileController::class, 'show']);
            Route::put('/update-name', [ProfileController::class, 'updateName']);

            /* ADDRESS */
            Route::get('/address', [AddressController::class, 'index']);
            Route::get('/address-default', [AddressController::class, 'defaultByUser']);
            Route::post('/address', [AddressController::class, 'store']);
            Route::get('/address/{id}', [AddressController::class, 'show']);
            Route::put('/address/{id}', [AddressController::class, 'update']);
            Route::put('/address/{id}/default', [AddressController::class, 'setDefault']);
            Route::delete('/address/{id}', [AddressController::class, 'destroy']);
        });

        /* KERANJANG */
        Route::prefix('keranjang')->group(function () {

            Route::get('/', [KeranjangController::class, 'index']);
            Route::post('/', [KeranjangController::class, 'store']);
            Route::put('/{id}', [KeranjangController::class, 'update']);
            Route::delete('/{id}', [KeranjangController::class, 'destroy']);
            Route::post('/checkout', [KeranjangController::class, 'checkout']);
        });

        Route::get('/keranjang/cek-stok', [KeranjangController::class, 'cekStok']);


        // routes/api.php

        Route::middleware(['auth:sanctum', 'role:user'])->group(function () {

            /**
             * 🔥 ROUTE INI SATU-SATUNYA YANG DIPAKAI TIMER
             * GET /api/pesanan/status-terakhir
             */
            Route::get('/pesanan/status-terakhir', function () {

                $user = Auth::user(); // ✅ TIDAK MERAH LAGI

                if (!$user) {
                    return response()->json(null);
                }

                return Pesanan::where('id_user', $user->id_user)
                    ->orderByDesc('id_pesanan')
                    ->first();
            });
        });





        /* PESANAN */
        Route::post('/pesanan', [PesananController::class, 'store']);
        Route::get('/pesanan-saya', [PesananController::class, 'myOrder']);
        Route::delete('/pesanan-batal/{id}', [PesananController::class, 'cancel']);
        Route::get('/pesanan-terakhir', [PesananController::class, 'latestPending']);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

        /* USER */
        Route::prefix('user')->group(function () {

            Route::get('/', [UserController::class, 'index']);
            Route::get('/{id}', [UserController::class, 'show']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
            Route::get('/pesanan-latest', [PesananController::class, 'latestStatus']);
            Route::get('/pesanan/status-terakhir', [PesananController::class, 'latestStatus']);
        });






        /* BUKU */
        Route::prefix('buku')->group(function () {

            Route::post('/', [BukuController::class, 'store']);
            Route::put('/{id}', [BukuController::class, 'update']);
            Route::delete('/{id}', [BukuController::class, 'destroy']);
        });

        /* PESANAN */
        Route::get('/pesanan', [PesananController::class, 'all']);
        Route::post('/pesanan/{id}', [PesananController::class, 'updateStatus']);

        //profil
        Route::get('/me', [AuthController::class, 'me']);
    });
});
