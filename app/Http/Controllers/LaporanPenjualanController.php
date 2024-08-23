<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        return view('admin.laporan_penjualan',[
            'title' => 'ADMIN | Laporan Penjualan',
            'page' => 'Laporan Penjualan'
        ]);
    }
}
