<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KasbonController extends Controller
{

    public function index(){
        return view('admin.kasbon', [
            "title" => "Admin | KASBON",
            "page" => "Kasbon",
            "barang" => barang::all()
        ]);
    }

    // public function detail_data($id_barang){
    //     return view('retrieve_detail',[
    //         "title" => "Single Post",
    //         "Jbarang" => barang::find($id_barang)
    //     ]);
    // }

    public function tambah_data_kasbon(){
        return view('admin.tambah_data_kasbon', [
            "title" => "Admin | KASBON",
            "page" => "Kasbon - Tambah Data",
            "barang" => barang::all()
        ]);
    }


}
