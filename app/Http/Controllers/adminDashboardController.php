<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class adminDashboardController extends Controller
{
    public function index(){
        return view('admin/dashboard', [
            'title' => 'ADMIN | Dashboard',
            'page' => 'Dasboard'
        ]);
    }

    public function tambah_data(){
        return view('admin.tambah_data',[
            'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data'
        ]);
    }


    public function simpanBarang(Request $request){
         $data = $request->validate([
            'nama_barang' => 'required',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'deks_barang' => 'required',
            'created_at' => 'required',
         ]);

         barang::create($data);
         return redirect()->route('tambah-data');
    }

}
