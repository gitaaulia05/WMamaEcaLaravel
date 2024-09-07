<?php

namespace App\Http\Controllers;


use App\Models\barang;
use App\Models\kasbon;
use App\Models\pembelian;
use App\Models\detail_pembelian;
use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\detail_kasbon;
use Illuminate\Support\Facades\DB;


class KasbonController extends Controller
{

    public function index(){
        return view('admin.kasbon.index', [
            "title" => "Admin | KASBON",
            "page" => "KASBON",
            "kasbon" => kasbon::with(['pembelian.users'])->get(),
        ]);
    }

    // public function detail_data($id_barang){
    //     return view('retrieve_detail',[
    //         "title" => "Single Post",
    //         "Jbarang" => barang::find($id_barang)
    //     ]);
    // }

    public function detail_data($slug){
        $dataUser = DB::table('users')->join('pembelian', 'pembelian.id_user', '=' , 'users.id_user' )->join('kasbon' , 'kasbon.id_pembelian' , '=' , 'pembelian.id_pembelian')->where('pembelian.slug' , '=' , $slug)->first();

        return view('admin.kasbon.detail_data', [
            'title' => "Admin | Detail Data Kasbon",
            'page' => 'Detail Data Kasbon',
            'data' => kasbon::with('detKasbon')->where('slug' , $slug)->first(),
            'user' => $dataUser,
            'pembelian' => pembelian::with(['detail_pembelian.namaBarang'])->where('slug' , $slug)->first(),
            
        ]);
    }


    public function tambah_data($slug){
        return view('admin.kasbon.tambah_data', [
            "title" => "Admin | Tambah Data Kasbon",
            "page" => "Tambah Data Kasbon",
            "data" => kasbon::with('user')->where('slug' , $slug)->first(),
           
        ]);
    }

    public function simpan_data(Request $request){
       $data= $request->validate([
        'total_kasbon' =>'required',
        'sisa_kasbon' =>'required',
        'tanggal_kasbon' =>'required|date',
       ]);

    $data["id_kasbon"] = (String) Str::uuid();
    $data["id_kasus"] = "1";
    kasbon::create($data);

    return redirect("/kasbon");
    
    }

}
