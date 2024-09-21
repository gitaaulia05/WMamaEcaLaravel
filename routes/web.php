<?php

use App\Livewire\KasbonTable;
use App\Http\Livewire\DetailKasbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasbonController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\LaporanPenjualanController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

        // TESTING AMBIL DATA KASBON
// Route::get('/', [KasbonController::class, 'index']);
//  Route::get('/{id_barang}', [KasbonController::class, 'detail_data']);


Route::middleware('guest')->group(function () {
         // LOGIN  USER - ADMIN
        Route::get('/login', [AuthenticateController::class, 'index'])->name('login');

        Route::post('/login-auth',[AuthenticateController::class,'auth_login'])->name('auth_login');

            // REGISTER CREATE USER
        Route::get('/register', [AuthenticateController::class, 'register']);
        Route::post('/create-user', [AuthenticateController::class,'create_user']);
});


        // BAGIAN USER
Route::middleware('auth' , 'cekUser')->group(function () {
        Route::get('/home', [UserController::class, 'index'])->name('user_home');

        Route::get('/barang/{slug}', [UserController::class, 'barang_detail']);

        Route::post('/barang-simpan', [UserController::class, 'barang_simpan']);

        Route::get('/profile', [UserController::class, 'profile']);
        Route::get('/pesanan/{slug}', [UserController::class, 'pesanan']);

        Route::get('/cart', [UserController::class, 'cart']);
});


Route::get('/', [UserController::class, 'index'])->name('home');

Route::post('/logout',[AuthenticateController::class,'destroy'])->middleware('auth');

Route::middleware(['auth', 'cekAdmin'])->group(function () {

                // DASHBOARD ADMIN
        Route::get('/dashboard-admin', [adminDashboardController::class,'index'])->name('dash_admin');
        Route::get('/tambah-data', [adminDashboardController::class,'tambah_data']);


                // DASHBOARD LAPORAN PENJUALAN
        Route::get('/laporan-penjualan', [LaporanPenjualanController::class,'index']);

                // DASHBOARD KASBON
         Route::get('/kasbon', [KasbonController::class, 'index']);
        Route::get('/detail-kasbon/{id_user}', [KasbonController::class, 'detail_data']);
        Route::get('/detail-kasbon-rinci/{slug}', [KasbonController::class, 'detail_rinci'])->name('detail-kasbon-rinci');
        Route::get('/tambah-data-kasbon/{slug}', [KasbonController::class, 'tambah_data']);

        Route::post('/simpan-data-kasbon', [KasbonController::class, 'simpan_data']);


});

