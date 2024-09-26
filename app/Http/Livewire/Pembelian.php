<?php

namespace App\Http\Livewire;

use session;
use Livewire\Component;
use App\Models\keranjangDetail;
use Illuminate\Support\Facades\Auth;

class Pembelian extends Component
{

    public $dataBarang;
    public $token;

    public function mount($token)
    {
        // mengambil session dari keranjangLive
        $barang_dipilih = session()->get('barang_dipilih' , []);

        $sessiontoken = session()->get('token' , []);

        if($token !== $sessiontoken){
            return redirect()->back();
        }

        if(empty($barang_dipilih)){
            return redirect()->back();
        } else {
            $this->dataBarang = keranjangDetail::with(['barang' , 'keranjang.users' => function($query){
                $query->where('id_user' , Auth::id());
            }])->whereIn('id_barang', $barang_dipilih)->get();
        }
        

    }

    public function render()
    {
        return view('livewire.pembelian', [
            "title" => "Pembelian Barang",
            "data" => $this->dataBarang,
            
    ] );
    }



}
