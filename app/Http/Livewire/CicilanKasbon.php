<?php

namespace App\Http\Livewire;

use App\Models\kasbon;
use Livewire\Component;
use App\Models\pembelian;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class CicilanKasbon extends Component
{   
    public $search = '';
    use WithPagination;
    public $slug;
    public function render()
    {
        return view('livewire.cicilan-kasbon' , [
            "title" => "Cicilan Kasbon | USER",
           'data' => kasbon::with(['detKasbon'=> function($query){
                    $query->orderBy('created_at' ,'desc');
                    $query->where('cicilan_ke' , 'like' ,'%'.$this->search.'%');
           }, 'pembelian.users'])->where('slug' , $this->slug)->first(),
            'pembelian' => pembelian::with(['detail_pembelian.namaBarang' , 'users'])->where('slug' , $this->slug)->first(),

        ]);
    }
}
