<?php

namespace App\Http\Livewire;
use App\Helpers\keranjangHelp;
use App\Models\barang;
use Livewire\Component;
use App\Models\keranjang;
use Illuminate\Support\Str;
use App\Models\keranjangDetail;
use Illuminate\Support\Facades\Auth;

class BarangUser extends Component
{
    public $slug;
    public $id_user;
    public $id_barang;
    public $kuantitas=[];
    public $checkBarang=[];
    public $hargaBarang = [];
    public $datas;
    public $maxBarang;
    public $counter = '';

   
    public function mount($slug)

    {
        $data = Barang::where('slug', $slug)->first();

        $dataKeranjang = keranjangDetail::whereHas('keranjang' , function($query){
            $query->where('id_user' , Auth::id());
        })->where('id_barang', $data->id_barang)->first();

 

        if ($data) {
            // Inisialisasi properti dari data yang diterima
            $this->id_barang = $data->id_barang;
        } else {
            // Optional: Handle jika data tidak ditemukan
            abort(404, 'Barang tidak ditemukan');
        }

        $this->kuantitas[0] = 1;
     
         $this->maxBarang = ($dataKeranjang && $dataKeranjang->kuantitas !== null )  ? $data->stok_barang - $dataKeranjang->kuantitas 
         : $data->stok_barang ;
           
         $this->datas = $data;


    }

    public function render()
    {
        return view('livewire.barang-user' , [
            "title" => "Detail Barang",
            "data" => barang::where('slug' , $this->slug)->first(),
        ]);
    }


    public function checkKuantitas() 
    {
        $kuantitasIni = isset($this->kuantitas[0]) ? (int)$this->kuantitas[0] : 1;
       
        if($kuantitasIni  >= $this->maxBarang ){
            session()->flash('kuantitasMessage' , 'Anda telah Memasukkan Barang  Anda Tidak Bisa Menambahkan Jumlah Barang. Karena melebihi batas stok !' );
         } 
           elseif($kuantitasIni  < 1) {
                session()->flash('disabled' , 'Masukkan Barang minimal 1 buah');
         }
            keranjangHelp::setKuantitasDipilih($this->kuantitas);


    }

    
    public function simpanBarang(){

        $keranjangCheck = keranjang::where('id_user' , Auth::id())->first();
      
            if(!$keranjangCheck){
                $keranjangData['id_keranjang'] = (String) Str::uuid();
                $keranjangData['id_user'] = Auth::id();
              keranjang::create($keranjangData);
 
            }
            $keranjang = keranjang::where('id_user' , Auth::id())->first();
         
            $dataBarang = keranjangDetail::whereHas('keranjang' , function($query){
                $query->where('id_user' , Auth::id());
            })->where('id_barang' , $this->id_barang)->first();

                if(!$dataBarang){
                    
                    $data = $this->validate([
                        'id_barang' =>'required',
                        // 'kuantitas' =>'required',
                    ]);
                    $data['kuantitas'] = isset($this->kuantitas[0]) ? (int) $this->kuantitas[0] : 1;
                    $data['id_keranjang'] = $keranjang->id_keranjang;
                    $data['id_detail_keranjang'] = (String) Str::uuid();
                    keranjangDetail::create($data);
                }  else{
                   
                    $dataBarang->update([
                        'kuantitas' => (int) reset($this->kuantitas) + $dataBarang->kuantitas,
                      
                    ]);
                }
              
                $this->dispatch('cartUpdated');

               
                session()->flash('message', 'Barang telah ditambahkan ke keranjang.');

    }


    public function simpanBarangDanBeliLangsung()
    {

        $barang_dipilih =  keranjangHelp::setBarangDipilih($this->checkBarang);
        $barang = barang::where('id_barang' , $barang_dipilih)->first();
         $kuantitas = keranjangHelp::setKuantitasDipilih($this->kuantitas);
        
         $harga[0] = $barang->harga_barang * reset($kuantitas);
         $this->hargaBarang = keranjangHelp::setHargaDipilih($harga);

             if(empty($barang_dipilih)) {
              
            session()->flash('message', 'Tidak ada barang yang dipilih.');
            return redirect()->back();
        } else {
           
            session()->put('barang_dipilih' , $barang_dipilih);
        return app('App\Http\Livewire\KeranjangLive')->pembelianPass();
        }
    
       
    }
    
   
}
