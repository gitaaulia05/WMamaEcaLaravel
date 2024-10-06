<?php

namespace App\Http\Livewire;

use session;
use App\Models\users;
use Livewire\Component;
use App\Models\keranjang;
use App\Models\keranjangDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangLive extends Component
{
     public $kuantitas= [];
     public $checkBarang= [];
     public $dataBarang=[];
     public $harga_barang;

   

     public function mount(){

        $kuantitasBarang = keranjangDetail::with(['barang'])->whereHas('keranjang', function($query) {
            $query->where('id_user', Auth::id());
        })->get();

        foreach ($kuantitasBarang as $k ) {
            $this->kuantitas[$k->barang->id_barang] = $k->kuantitas;
        }

     }

    public function render()
    {
        // $keranjang = keranjangDetail::with(['keranjang' => function($query){
        //     $query->where("id_user" , Auth::id())->first();
        //       }, 'barang' ])->select('id_barang' , DB::raw('count(id_barang) as count') , DB::raw('sum(kuantitas) as total' ))->groupBy('id_barang')->get();
        //     //   dd($keranjang);
        return view('livewire.keranjang-live' , [
            "title" => "Keranjang",
            "keranjang" => keranjangDetail::whereHas('keranjang', function($query) {
                $query->where('id_user', Auth::id());
            })->get(),
            
                 "user" => users::where('id_user' , Auth::id())->first(),
                 
        ]);

      

    }

    public function hapusBarang($id_barang){
       keranjangDetail::where('id_barang' , $id_barang)->delete();
       // untuk update angka di keranjang nav (keranjang counter.)
        $this->dispatch('cartUpdated');
        session()->flash('message' , 'data berhasil dihapus');

    }

    public function updateKuantitas($id_barang ){
        $keranjangUpdate = keranjangDetail::whereHas('keranjang' ,function($query){
            $query->where('id_user', Auth::id());
        }
        )->where('id_barang' , $id_barang)->first();
          
      
            $keranjangUpdate->update([
                'kuantitas' => $this->kuantitas[$id_barang] 
        ]);
       
    }

    public function pembelian()
    {
        // pakai ini karena kalo $this->checkBarang mengembalikan array asosiatif, untuk mengambil id_barang
        $barang_dipilih = array_keys(array_filter($this->checkBarang));

        
         $this->dataBarang = keranjangDetail::with(['barang'])->whereIn('id_barang' ,$barang_dipilih)->get();

         $total_harga=0;

         foreach($this->dataBarang as $hargaBarang){
            $total_harga += $hargaBarang->barang->harga_barang;
         }
            
         $this->harga_barang = $total_harga;

         session()->put('harga_barang' , $total_harga);
       
    }


    public function pembelianPass()
    {
        $barang_dipilih = array_keys(array_filter($this->checkBarang));
            
        session()->put('barang_dipilih' , $barang_dipilih);


            if(session()->has('barang_dipilih')  && !empty(session()->get('barang_dipilih')) )  {
                $token = bin2hex(random_bytes(16));
                session()->put('token' , $token);
        
               return redirect()->to("/pembelian/$token");
            } else {
                return redirect()->back();
            }
       
    }
   
}
