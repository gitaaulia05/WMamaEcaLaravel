<?php

namespace App\Http\Livewire;

use App\Models\barang;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\keranjangDetail;

class BarangUser extends Component
{
    public $slug;
    public $id_barang;

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
    }

    public function render()
    {
        return view('livewire.barang-user' , [
            "title" => "Detail Barang",
            "data" => barang::where('slug' , $this->slug)->first(),
        ]);
    }

    
    public function simpanBarang(){
      
            $data = $this->validate([
                'id_barang' =>'required',
                
            ]);
            $data['id_detail_keranjang'] = (String) Str::uuid();
            keranjangDetail::create($data);
       
    }
}
