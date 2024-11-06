<?php

use App\Livewire\KasbonTable;
use App\Http\Livewire\Pembelian;
use App\Http\Livewire\DetailKasbon;
use App\Http\Livewire\KeranjangLive;
use App\Http\Livewire\PembelianLive;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasbonController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\LaporanPenjualanController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\ExcelExportController;

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
        Route::get('/cicilanKasbon/{slug}', [UserController::class, 'cicilan_kasbon']);

        Route::get('/update-profile', [UserController::class, 'update_profile']);

        Route::get('/keranjang', [UserController::class, 'keranjang']);

        route::post('/beli-langsung' , [KeranjangLive::class , 'pembelianPass']);

        Route::get('/pembelian/{token}' , [UserController::class , 'pembelianPlain'] );

     

});


        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/produk', [UserController::class, 'produk']);


        Route::post('/logout',[AuthenticateController::class,'destroy'])->middleware('auth');

        Route::middleware(['auth', 'cekAdmin'])->group(function () {

                // DASHBOARD ADMIN
        Route::get('/dashboard-admin', [adminDashboardController::class,'index'])->name('dash_admin');
        Route::get('/tambah-data', [adminDashboardController::class,'tambah_data']);
        Route::get('/detailBarang/{slug}', [adminDashboardController::class,'detail_barang'])->name('detail_barang');
        Route::get('/editBarang/{slug}', [adminDashboardController::class,'edit_barang']);
        Route::delete('/hapusBarang/{slug}', [adminDashboardController::class,'destroy']);
        
        Route::post('/simpanBarang', [adminDashboardController::class,'simpanBarang']);
        // Route::get('/tambah-data', [adminDashboardController::class, 'tambah_data'])->name('tambah-data');
        // Route::get('/edit-data/{id}', [adminDashboardController::class, 'editBarang'])->name('edit-data');
        // Route::post('/update-data/{id}, [adminDashboardController::class, 'updateBarang'])->name('update-data');

        Route::put('/ubahBarang/{slug}', [adminDashboardController::class, 'updateBarang']);
        Route::get('/export', [ExcelExportController::class, 'export'])->name('export');
                
                // DASHBOARD LAPORAN PENJUALAN
        Route::get('/laporan-penjualan', [LaporanPenjualanController::class,'index']);
        Route::get('/detailLaporanPenjualan/{slug}', [LaporanPenjualanController::class,'detail_laporan']);

                // DASHBOARD KASBON
         Route::get('/kasbon', [KasbonController::class, 'index']);
        Route::get('/detail-kasbon/{id_user}', [KasbonController::class, 'detail_data']);
        Route::get('/detail-kasbon-rinci/{slug}', [KasbonController::class, 'detail_rinci'])->name('detail-kasbon-rinci');
        Route::get('/tambah-data-kasbon/{slug}', [KasbonController::class, 'tambah_data']);

        Route::post('/simpan-data-kasbon', [KasbonController::class, 'simpan_data']);

});