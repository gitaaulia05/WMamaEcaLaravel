<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KasbonController extends Controller
{
    public function index(){
        return view('retrieve', [
            "title" => "Show All",
            "barang" => barang::all()
        ]);
    }

    // public function detail_data($id_barang){
    //     return view('retrieve_detail',[
    //         "title" => "Single Post",
    //         "Jbarang" => barang::find($id_barang)
    //     ]);
    // }




}
