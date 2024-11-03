<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\keranjangDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangCounter extends Component
{
    public $counter = 0;
    protected $listeners = ['cartUpdated' => 'hitung'];

    public function mount()
    {
        $this->hitung();
    }


    public function render()
    {
        return view('livewire.keranjang-counter' , [
                "title" => "Keranjang",
                'counter' => $this->counter,
    
        ]);
    }


      // ini buat di navbar angka nya
    public function hitung()
    {
        $this->counter = keranjangDetail::whereHas('keranjang', function($query){
            $query->where('id_user' , Auth::id());
        })->select('id_barang')->groupBy('id_barang')->get()->count();
       
    }

}
