<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\barang;
use App\Models\pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\keranjangDetail;
use App\Models\detail_pembelian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function index(){
            return view('user.index',[   
                "title" => 'USER',
               "gambar" =>  users::where('id_user' , Auth::id())->first(),
                
            ]);
    }  
    public function produk(){
            return view('user.produk',[   
                "title" => 'Katalog Produk',
                "gambar" =>  users::where('id_user' , Auth::id())->first(),
            ]);
    }  

    public function barang_detail($slug){
        $barang = barang::where('slug' , $slug)->first();
        return view('user.detail_barang',[
                "title" => "Detail Barang",
                "data" => $barang,
                'slug' => $slug,
                'id_user' => $barang->id_user,
                "gambar" =>  users::where('id_user' , Auth::id())->first(),
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
            "title" => "PROFILE | USER",
            "data" => users::where('id_user' , Auth::id())->first(),
            "gambar" =>  users::where('id_user' , Auth::id())->first(),
        ]);
    }

    public function pesanan($slug)
    {
        return view('user.pesanan' , [
            "title" => "PROFILE | USER",
            "data" => pembelian::with(['detail_pembelian' => function($query) use ($slug){
                $query->where('slug' , $slug)->first();
            } , 'detail_pembelian.namaBarang'])->where('id_user' , Auth::id())->get(),

            "data1" => detail_pembelian::with('namaBarang')->where('slug' , $slug)->get(),
            "gambar" =>  users::where('id_user' , Auth::id())->first(),
        ]);
    }

    public function cicilan_kasbon($slug){
        return view('user.cicilan_kasbon' , [
            "title" => "Cicilan Kasbon | USER",
            'slug' => $slug,
            "gambar" =>  users::where('id_user' , Auth::id())->first(),
        ] );
    }

    public function keranjang(){
        return view('user.keranjang' , [
            "title" => "Keranjang",
            "gambar" =>  users::where('id_user' , Auth::id())->first(),
        ]);

    }
    public function pembelianPlain($token){
        return view('user.pembelianCo' , [
            "title" => "Pembelian Barang",
            "token" => $token,
            "data" =>  users::where('id_user' , Auth::id())->first(),
            "gambar" =>  users::where('id_user' , Auth::id())->first(),
        ]);
    }

    public function update_profile(){
        return view('user.update_profile' , [
            "title" => "USER | Ubah Profile",
            "gambar" =>  users::where('id_user' , Auth::id())->first(),
           
        ]);
    }
    

    public function simpanUpdate(Request $request){
        $user = users::where('id_user' , Auth::id())->first();

        $data = $request->validate([
           'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);

        $user->nama = $data['nama'];
        $user->alamat = $data['alamat'];
        $user->no_hp = $data['no_hp'];
        $user->img = $data['img'];

        if ($request->hasFile('img')) {
            if($user->img && Storage::disk('public')->exists($user->img)){
                Storage::disk('public')->delete($user->img);
            }
        $user->img = $request->file('img')->store('imagePengguna' , 'public');
    }

    $user->save();
    return redirect('/profile')->with('message' , 'Data Profile Berhasil Diubah');
    
    }
 
  
}

