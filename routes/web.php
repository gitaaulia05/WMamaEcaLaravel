<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasbonController;

Route::get('/', [KasbonController::class, 'index']);
Route::get('/{id_barang}', [KasbonController::class, 'detail_data']);

Route::get('/login', function() {
    return view('login');
});

