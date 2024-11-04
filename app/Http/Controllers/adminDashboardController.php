<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    public function index(){
        return view('admin/dashboard', [
            'title' => 'ADMIN | Dashboard',
            'page' => 'Dasboard'
        ]);
    }

    public function detail_barang($slug){
        return view('admin.barang.detail_barang',[
            'title' => 'ADMIN | Detail Barang',
            'page' => 'Dashboard - Detail Barang',
            'barang' => barang::where('slug' , $slug)->first(),
        ]);
    }

    
    public function edit_barang($slug){
        return view('admin.barang.edit_barang',[
            'title' => 'ADMIN | Ubah Data Barang',
            'page' => 'Dashboard - Ubah Data Barang',
            'barang' => barang::where('slug' , $slug)->first(),
        ]);
    }

    public function tambah_data(){
        return view('admin.barang.tambah_data',[
            'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data'
        ]);
    }


    public function simpanBarang(Request $request){
         $data = $request->validate([
            'nama_barang' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'deks_barang' => 'required',
            'created_at' => 'required',
         ]);

       
            $data['id_barang'] = (String) Str::uuid();
        if($request->hasFile('img')){
            $image = $request->file('img');
            $data['img'] =  $image->hashName();
              $image->storeAs('public/barang',   $data['img']);
        } else {
            return back();
        }

      
         barang::create($data);
         return redirect()->route('dash_admin')->with('message' , "Tambah Data Barang Berhasil !");
    }

}
