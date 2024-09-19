<?php

namespace App\Http\Controllers;


use App\Models\users;
use App\Models\barang;
use App\Models\kasbon;
use App\Models\pembelian;
use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\detail_kasbon;
use App\Models\detail_pembelian;
use Illuminate\Support\Facades\DB;

class KasbonController extends Controller
{
    use WithPagination;
    public function index(){
        return view('admin.kasbon.index', [
            "title" => "Admin | KASBON",
            "page" => "KASBON",
            "pembelian" => pembelian::with(['users' , 'detail_pembelian.namaBarang' , 'kasbon'])->select('id_user')->groupBy('id_user')->paginate(1),

        ]);
    }


    // INI DIPINDAH KE CONTROLLER DETAILKASBON
    public function detail_data($id_user){
        return view('admin.kasbon.detail_data', [
            'title' => "Admin | Detail Data Kasbon",
            'page' => 'Detail Data Kasbon',
            'pembelian' => pembelian::with(['users'], ['kasbon' ],['detail_pembelian.namaBarang'] )->select('id_user')->where('id_user' , $id_user)->get(),
            'id_user' => $id_user,
        ]);
    }


    public function detail_rinci($slug){

            return view('admin.kasbon.detail_rinci',[
                'title' => "Admin | Detail Data Kasbon",
                'page' => 'Detail Data Kasbon',
                'data' => kasbon::with(['detKasbon', 'pembelian.users'])->where('slug' , $slug)->first(),
                 'pembelian' => pembelian::with(['detail_pembelian.namaBarang' , 'users'])->where('slug' , $slug)->first(),
                'slug' => $slug,
                
            ]);
        
    }

    public function tambah_data($slug){
        session(['slug' => $slug]);
        return view('admin.kasbon.tambah_data', [
   
            "title" => "Admin | Tambah Data Kasbon",
            "page" => "Tambah Data Kasbon",
            "data" => kasbon::with(['pembelian.users' , 'detKasbon' => function($query){
                    $query->orderBy('created_at' , 'desc');
            }])->where('slug' , $slug)->first(),
        
        ]);
    }

    public function simpan_data(Request $request ){
       
       $data= $request->validate([
        'cicilan_ke' => 'required',
        'total_bayar' =>'required|integer',
        'sisa_bayar' =>'required|numeric',
        'tanggal_bayar' =>'required|date',
        'is_lunas' =>'required',
       ]);

           // ini ngambil slug dari session 
    $id_kasbon = session('slug');
    $kasbon = kasbon::where('slug' , $id_kasbon)->first();

    $data["id_det_kasbon"] = (String) Str::uuid();
    $data["id_kasbon"] = $kasbon->id_kasbon;
    detail_kasbon::create($data);

    $pembelian = pembelian::find($kasbon->id_pembelian);

    $user = users::find($pembelian->id_user);

    if($data['is_lunas'] == 1 ){
        $user->limit = $user->limit + $kasbon->total_kasbon;
        $user->save();
    }

    return redirect()->route('detail-kasbon-rinci' , ['slug' => $kasbon->slug])->with('status', 'Data Cicilan Berhasil Di tambahkan');
    
     }

}
