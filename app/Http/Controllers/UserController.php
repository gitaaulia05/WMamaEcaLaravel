<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\keranjangDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
            return view('user.index',[   
                "title" => 'USER',
                "data" => barang::all(),
                
            ]);
    }  

    public function barang_detail($slug){
        $barang = barang::where('slug' , $slug)->first();
        return view('user.detail_barang',[
                "title" => "Detail Barang",
                "data" => $barang,
                'slug' => $slug,
                'id_user' => $barang->id_user,
        ]);
    }

    public function barang_simpan(Request $request){

        $data = $request->validate([
            'id_barang' =>'required',
            
        ]);
        $data['id_detail_keranjang'] = (String) Str::uuid();
        keranjangDetail::create($data);
    }

    public function profile()
    {
        return view('user.profile' , [
            "title" => "PROFILE | USER"
        ]);
    }

    public function pesanan($slug)
    {
        return view('user.pesanan' , [
            "title" => "PROFILE | USER",
            "data" => pembelian::with(['detail_pembelian.namaBarang' ])->where('id_user' , Auth::id())->get(),
        ]);
    }

    public function keranjang(){
        return view('user.keranjang' , [
            "title" => "Keranjang"
        ]);
    }
    public function pembelianPlain($token){
        return view('user.pembelianCo' , [
            "title" => "Pembelian Barang",
            "token" => $token,
        ]);
    }
    
    public function user_test(){
        return view('welcome');
    }
}
