<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\KasbonController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\LaporanPenjualanController;

        // TESTING AMBIL DATA KASBON
// Route::get('/', [KasbonController::class, 'index']);
//  Route::get('/{id_barang}', [KasbonController::class, 'detail_data']);

            // LOGIN  USER - ADMIN 
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/', [UserController::class, 'index'])->name('home')->middleware('auth.custom');
            
Route::post('/auth-login',[loginController::class,'auth_login']);


            // REGISTER CREATE USER
Route::get('/register', [registerController::class, 'index'])->middleware('guest');;
Route::post('/create-user', [registerController::class,'create_user']);


        // BAGIAN USER
       




            // DASHBOARD ADMIN
Route::get('/dashboard-admin', [adminDashboardController::class,'index']);
Route::get('/tambah-data', [adminDashboardController::class,'tambah_data']);


            // DASHBOARD LAPORAN PENJUALAN 
Route::get('/laporan-penjualan', [LaporanPenjualanController::class,'index']);


            // DASHBOARD KASBON 
Route::get('/kasbon', [KasbonController::class, 'index']);