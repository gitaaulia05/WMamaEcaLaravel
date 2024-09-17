<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pembelian;
use Illuminate\Support\Facades\Auth;

class ProfileTable extends Component
{
    public $search = '';
    public function render()
    {


        return view('livewire.profile-table', [
            "title" => "PROFILE | USER",
            "data" => pembelian::with( 'detail_pembelian.namaBarang' )->where('id_user' , Auth::id())->get(),

        ]);
    }

     public function updatingSearch()
     {
        $this->resetPage();
     }
}
