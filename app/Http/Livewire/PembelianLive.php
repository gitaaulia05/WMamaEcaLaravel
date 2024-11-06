<?php

namespace App\Http\Livewire;

use session;
use App\Models\users;
use App\Models\barang;
use App\Models\kasbon;
use Livewire\Component;
use App\Models\pembelian;
use Illuminate\Support\Str;
use App\Models\keranjangDetail;
use App\Models\detail_pembelian;
use Illuminate\Support\Facades\Auth;

use App\Helpers\keranjangHelp;

class PembelianLive extends Component
{
    public $dataBarang;
    public $hargaBarang=[];
    public $token;

    public $total_bayar;
    public $kuantitas;
    public $limit;
    public $harga_perProduk;

    public $barangDipilih;


    public function mount($token)
    {
    
        $this->barangDipilih = array_keys(keranjangHelp::getBarangDipilihSession());
 
        $this->kuantitas = keranjanghelp::getKuantitasDipilihSession();
        $this->hargaBarang = keranjanghelp::getHargaDipilihSession();
     
    
        $sessiontoken = session()->get('token' , []);

        if($token !== $sessiontoken){
            return redirect()->back();
        }

        if(empty($this->barangDipilih)){
            return redirect()->back();
        } 


                $this->dataBarang = barang::whereIn('id_barang' , $this->barangDipilih)->get();

    }

    public function render()
    {

        $barang = array_keys(array_filter($this->dataBarang->toArray()));
        // dd($this->kuantitas);
        return view('livewire.pembelian-live', [
            "title" => "Pembelian Barang",
            "data" => $this->dataBarang,
            "kuantitas" => $this->kuantitas,
            "filterUser" => users::where('id_user' , Auth::id())->get(),
          
          
            "hargaBarang" => $this->hargaBarang,
          
    ] );

  
    }

        public function simpanData(){
     
            $pembelian['total_bayar'] = is_array($this->hargaBarang) ? array_sum($this->hargaBarang) : $this->hargaBarang;;

            $pembelian['id_pembelian'] = (String) Str::uuid();
           
            $pembelian['id_user'] = Auth::id();

            $pembelianFinal =  pembelian::create($pembelian);

            foreach( $this->barangDipilih as $barang){
                // karena yang di dapat hanya bilangan bukan array
                $barang = barang::where('id_barang', $barang)->first();

                $detailKeranjang = keranjangDetail::whereHas('keranjang' , function($query){
                    $query->where('id_user' , Auth::Id());
                })->where('id_barang', $barang->id_barang)->first();


                $kuantitas = isset($this->kuantitas[$barang->id_barang]) ? $this->kuantitas[$barang->id_barang] : 1;
               
                detail_pembelian::create([
                    'id_det_pem' => (String) Str::uuid(),
                    'id_pembelian' => $pembelian['id_pembelian'],
                    'id_barang' => $barang->id_barang,
                    'kuantitas' =>   $kuantitas ,
                    'harga_perProduk' => $barang->harga_barang,
                    'slug' => $pembelianFinal->slug,
                ]);

                $barangUpdate = $barang->update([
                    'stok_barang' => $barang->stok_barang - $kuantitas ,  
                ]);

                if($barang->stok_barang - $kuantitas == 0){
                    $barang->update([
                        'is_arsip' => 1,
                    ]);
                }

                // $detailKeranjang->delete();
                   // Tambahkan pengecekan sebelum delete
        if ($detailKeranjang) {
            $detailKeranjang->delete();
        }
    

            }

                kasbon::create([
                    'id_kasbon' => (String) Str::uuid(),
                    'id_pembelian' => $pembelian['id_pembelian'],
                    'slug' => $pembelianFinal->slug, 
                    'total_kasbon' => array_sum($this->hargaBarang),
                ]);

                    $userUpdate = users::where('id_user' , Auth::id())->first();
                   
                $updated = $userUpdate->update([
                    'limit' =>$userUpdate->limit - array_sum($this->hargaBarang),
                ]);



               return redirect('/profile');

        }
}
