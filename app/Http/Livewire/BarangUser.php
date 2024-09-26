<?php

namespace App\Http\Livewire;

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
    public $kuantitas;
    public $counter = '';

    public function mount($slug)

    {
        $data = Barang::where('slug', $slug)->first();

        if ($data) {
            // Inisialisasi properti dari data yang diterima
            $this->id_barang = $data->id_barang;
        } else {
            // Optional: Handle jika data tidak ditemukan
            abort(404, 'Barang tidak ditemukan');
        }

        $this->kuantitas =1;
    }

    public function render()
    {
        return view('livewire.barang-user' , [
            "title" => "Detail Barang",
            "data" => barang::where('slug' , $this->slug)->first(),
        ]);
    }

    
    public function simpanBarang(){
      
        $keranjangCheck = keranjang::where('id_user' , Auth::id())->first();

            if(!$keranjangCheck){
                $keranjangData['id_keranjang'] = (String) Str::uuid();
                $keranjangData['id_user'] = Auth::id();
              keranjang::create($keranjangData);
 
            }
            $keranjang = keranjang::where('id_user' , Auth::id())->first();

            $dataBarang = keranjangDetail::where('id_barang' , $this->id_barang)->first();

                if(!$dataBarang){
                    
                    $data = $this->validate([
                        'id_barang' =>'required',
                        'kuantitas' =>'required|integer',
                    ]);
                    $data['id_keranjang'] = $keranjang->id_keranjang;
                    $data['id_detail_keranjang'] = (String) Str::uuid();
                    keranjangDetail::create($data);
                }  else{
                    $dataBarang->update([
                        'kuantitas' => $this->kuantitas + $dataBarang->kuantitas,
                    ]);
                }

              
                $this->dispatch('cartUpdated');

                session()->flash('message' , 'barang berhasil masuk keranjang');
    }


}
