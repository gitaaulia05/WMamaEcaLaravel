<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\detail_pembelian;
use Illuminate\Support\Facades\DB;
use App\Models\barang;

class LaporanPenjualanController extends Controller
{
    public function index()
    {

        return view('admin.laporan_penjualan',[
            'title' => 'ADMIN | Laporan Penjualan',
            'page' => 'Laporan Penjualan',
            'data' =>detail_pembelian::with('namaBarang')->select('id_barang' ,  DB::raw('SUM(kuantitas) as total'))->groupBy('id_barang')->get(),
        ]);
    }

    public function detail_laporan($slug){
        return view('admin.detail_LaporanPenjualan',[
            'title' => 'ADMIN | Laporan Penjualan',
            'page' => 'Detail Laporan Penjualan',
            'data' => barang::where('slug', $slug)->first(),
        ]);
    }


}
