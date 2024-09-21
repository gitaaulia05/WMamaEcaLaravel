<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\keranjang;
use Illuminate\Support\Facades\Auth;

class KeranjangLive extends Component
{
    public function render()
    {
        return view('livewire.keranjang-live' , [
            "title" => "Keranjang",
            "keranjang" => keranjang::with(["keranjangDetail.barang"])->where("id_user" , Auth::id())->get(),
        ]);
    }
}
