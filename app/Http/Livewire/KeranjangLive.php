<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\keranjang;
use App\Models\keranjangDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangLive extends Component
{
    public function render()
    {
        return view('livewire.keranjang-live' , [
            "title" => "Keranjang",
        "keranjang" => keranjangDetail::with(['keranjang' => function($query){
                $query->where("id_user" , Auth::id())->get();
        }, 'barang'])->select('id_barang' , DB::raw('count(id_barang) as count'))->groupBy('id_barang')->get(),

        ]);

    }
}
