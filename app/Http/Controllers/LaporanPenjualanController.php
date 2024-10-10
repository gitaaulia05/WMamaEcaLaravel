<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\detail_pembelian;
use Illuminate\Support\Facades\DB;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        return view('admin.laporan_penjualan',[
            'title' => 'ADMIN | Laporan Penjualan',
            'page' => 'Laporan Penjualan',
        'data'=> detail_pembelian::with('namaBarang')->select('id_barang', DB::raw('sum(id_barang) as idBarang'))->groupBy('id_barang')->get(),
        ]);
    }
}
