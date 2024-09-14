<?php

namespace App\Http\Controllers;


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
                'pembelian' => pembelian::with(['detail_pembelian.namaBarang'])->where('slug' , $slug)->first(),
                
            ]);
        
    }


    public function tambah_data($slug){
        return view('admin.kasbon.tambah_data', [
            "title" => "Admin | Tambah Data Kasbon",
            "page" => "Tambah Data Kasbon",
            "data" => kasbon::with('pembelian.users' , 'detKasbon')->where('slug' , $slug)->first(),
         
        ]);
    }

    public function simpan_data(Request $request ){
       $data= $request->validate([
        'id_kasbon' => 'required',
        'cicilan_ke' => 'required',
        'total_bayar' =>'required|integer',
        'sisa_bayar' =>'required|numeric',
        'tanggal_bayar' =>'required|date',
        'is_lunas' =>'required',
       ]);

    $data["id_det_kasbon"] = (String) Str::uuid();
    detail_kasbon::create($data);
    $kasbon = kasbon::find($data['id_kasbon']);
    return redirect()->route('detail-kasbon-rinci' , ['slug' => $kasbon->slug])->with('status', 'Data Cicilan Berhasil Di tambahkan');
    
     }

}
