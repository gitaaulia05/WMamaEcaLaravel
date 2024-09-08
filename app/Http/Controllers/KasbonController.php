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
        $pembelians= pembelian::with(['users' , 'detail_pembelian.namaBarang' , 'kasbon'])->get()->unique('id_user');
        return view('admin.kasbon.index', [
            "title" => "Admin | KASBON",
            "page" => "KASBON",
            // "kasbon" => kasbon::with(['pembelian.users' , 'pembelian.detail_pembelian.namaBarang'])->get(),

            "pembelian" => $pembelians,

        ]);
    }

    public function detail_data($id_user){
        $dataUser = DB::table('users')->join('pembelian', 'pembelian.id_user', '=' , 'users.id_user' )->join('kasbon' , 'kasbon.id_pembelian' , '=' , 'pembelian.id_pembelian')->where('pembelian.id_user' , '=' , $id_user);

        return view('admin.kasbon.detail_data', [
            'title' => "Admin | Detail Data Kasbon",
            'page' => 'Detail Data Kasbon',
            'pembelian' => pembelian::with(['users'], ['kasbon' ],['detail_pembelian.namaBarang'] )->where('id_user' , $id_user)->get(),
        
        ]);
    }


    public function detail_rinci(){

            // $dataUser = DB::table('users')->join('pembelian', 'pembelian.id_user', '=' , 'users.id_user' )->join('kasbon' , 'kasbon.id_pembelian' , '=' , 'pembelian.id_pembelian')->where('pembelian.id_user' , '=' , $id_user)->first();
    
            return view('admin.kasbon.detail_rinci',[
                'title' => "Admin | Detail Data Kasbon",
                'page' => 'Detail Data Kasbon',
                // 'data' => kasbon::with('detKasbon')->where('slug' , $slug)->first(),
                // 'user' => $dataUser,
                // 'pembelian' => pembelian::with(['detail_pembelian.namaBarang'])->where('slug' , $slug)->first(),
                
            ]);
        
    }


    public function tambah_data($slug){
        return view('admin.kasbon.tambah_data', [
            "title" => "Admin | Tambah Data Kasbon",
            "page" => "Tambah Data Kasbon",
            "data" => kasbon::with('pembelian')->where('slug' , $slug)->first(),
           
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
