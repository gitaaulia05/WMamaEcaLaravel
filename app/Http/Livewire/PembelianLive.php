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

class PembelianLive extends Component
{
    public $dataBarang;
    public $hargaBarang;
    public $token;

    public $total_bayar;
    public $kuantitas;
    public $limit;
    public $harga_perProduk;

    public $barangDipilih;

    public function mount($token)
    {
        // mengambil session dari keranjangLive
        $barang_dipilih = session()->get('barang_dipilih' , []);
        $this->barangDipilih = $barang_dipilih;

       $this->hargaBarang = session()->get('harga_barang' , []);

        $sessiontoken = session()->get('token' , []);

        if($token !== $sessiontoken){
            return redirect()->back();
        }

        if(empty($barang_dipilih)){
            return redirect()->back();
        } else {
            $this->dataBarang = keranjangDetail::whereHas('keranjang' , function($query) {
                $query->where('id_user' , Auth::id());
            })->with(['barang' , 'keranjang.users' => function($query){
                $query->where('id_user' , Auth::id());
            }])->whereIn('id_barang', $barang_dipilih)->get();
        }
        

        foreach($this->dataBarang as $u){
            $this->kuantitas = $u->kuantitas;
        }

    }

    public function render()
    {
        $barang = array_keys(array_filter($this->dataBarang->toArray()));

        return view('livewire.pembelian-live', [
            "title" => "Pembelian Barang",
            "data" => $this->dataBarang,
            "filterUser" => keranjangDetail::whereHas('keranjang' , function($query) {
                $query->where('id_user' , Auth::id());
            })->with('keranjang.users')->get(),
            "hargaBarang" => $this->hargaBarang,
            
    ] );
    }

        public function simpanData(){
        
            $pembelian['total_bayar'] = $this->hargaBarang;

            $pembelian['id_pembelian'] = (String) Str::uuid();
           
            $pembelian['id_user'] = Auth::id();

          $pembelianFinal =  pembelian::create($pembelian);

            foreach( $this->barangDipilih as $barang){
                // karena yang di dapat hanya bilangan bukan array
                $barang = barang::where('id_barang', $barang)->first();

                $detailKeranjang = keranjangDetail::whereHas('keranjang' , function($query){
                    $query->where('id_user' , Auth::Id());
                })->where('id_barang', $barang->id_barang)->first();


                detail_pembelian::create([
                    'id_det_pem' => (String) Str::uuid(),
                    'id_pembelian' => $pembelian['id_pembelian'],
                    'id_barang' => $barang->id_barang,
                    'kuantitas' =>$barang->id_barang,
                    'harga_perProduk' => $barang->harga_barang,
                    'slug' => $pembelianFinal->slug,
                ]);

                $barangUpdate = $barang->update([
                    'stok_barang' => $barang->stok_barang - $this->kuantitas,

                ]);

                $detailKeranjang->delete();

            }

                kasbon::create([
                    'id_kasbon' => (String) Str::uuid(),
                    'id_pembelian' => $pembelian['id_pembelian'],
                    'slug' => $pembelianFinal->slug, 
                    'total_kasbon' => $this->hargaBarang,
                ]);

                    $userUpdate = users::where('id_user' , Auth::id())->first();
                   
                $updated = $userUpdate->update([
                    'limit' =>$userUpdate->limit - $this->hargaBarang,
                ]);



               return redirect('/keranjang');

        }
}
