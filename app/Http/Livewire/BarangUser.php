<?php

namespace App\Http\Livewire;
use App\Models\users;
use Livewire\Component;
use App\Models\keranjang;
use App\Models\barang;
use Illuminate\Support\Str;
use App\Helpers\keranjangHelp;
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

    public $totalHarga;

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

        if($this->maxBarang == 0){
            session()->flash('disabled' , 'Anda telah Memasukkan Barang Anda Tidak Bisa Menambahkan Jumlah Barang. Karena melebihi batas stok !' );
        }

         $this->datas = $data;


    }

    public function render()
    {
        return view('livewire.barang-user' , [
            "title" => "Detail Barang",
            "data" => barang::where('slug' , $this->slug)->first(),
            "pembeli" => users::where('id_user' , Auth::id())->first(),
        ]);
    }


    public function checkKuantitas()
    
    {
       
          $kuantitasIni = isset($this->kuantitas[0]) ? (int)$this->kuantitas[0] : 1;


            
       if($kuantitasIni  >= $this->maxBarang ){
            session()->flash('kuantitasMessage' , 'Anda telah Memasukkan Barang Anda Tidak Bisa Menambahkan Jumlah Barang. Karena melebihi batas stok !' );
         }
           elseif($kuantitasIni  < 1) {
                session()->flash('disabled' , 'Masukkan Barang minimal 1 buah');
         }

         $HargaBarang = barang::where('slug' , $this->slug)->first();
        $this->totalHarga = $HargaBarang->harga_barang * $this->kuantitas[0];

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
                // dd($barang_dipilih);
        $barang = barang::where('id_barang' ,  array_keys($barang_dipilih))->first();
    
       
         $kuantitas = keranjangHelp::setKuantitasDipilih($this->kuantitas , array_keys($this->checkBarang));
        //  dd($kuantitas);

         if($barang && $barang->harga_barang){
            $harga[0] = $barang->harga_barang * reset($kuantitas);
         }  else {
            $harga[0] =0;
         }


         $this->hargaBarang = keranjangHelp::setHargaDipilih($harga, array_keys($this->checkBarang));

        //  dd($this->hargaBarang);

             if(empty($barang_dipilih)) {

            session()->flash('message', 'Tidak ada barang yang dipilih.');
            return redirect()->back();
        } else {

            session()->put('barang_dipilih' , $barang_dipilih);
        return app('App\Http\Livewire\KeranjangLive')->pembelianPass();
        }


    }


}
