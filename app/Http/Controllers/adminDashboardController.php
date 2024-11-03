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

    public function tambah_data(){
        return view('admin.tambah_data',[
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

        //  $image  = $request->file('image');
        // $data['img']= $image->storeAs('public/barang' , $image->hashName());
            $data['id_barang'] = (String) Str::uuid();
        if($request->hasFile('img')){
            $image = $request->file('img');
            $data['img'] = $image->storeAs('public/barang' , $image->hashName());
        } else {
            return back();
        }

      
         barang::create($data);
         return redirect()->route('dash_admin')->with('message' , "Tambah Data Barang Berhasil !");
    }

}
