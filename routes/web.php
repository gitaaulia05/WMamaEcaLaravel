<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\KasbonController;
use App\Http\Controllers\registerController;

Route::get('/', [KasbonController::class, 'index']);
// Route::get('/{id_barang}', [KasbonController::class, 'detail_data']);

            // LOGIN  USER - ADMIN 
Route::get('/login',[loginController::class,'index']);


            // REGISTER CREATE USER
Route::get('/register', [registerController::class, 'index']);
