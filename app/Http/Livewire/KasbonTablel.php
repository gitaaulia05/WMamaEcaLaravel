<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pembelian;
use Livewire\WithPagination;

class KasbonTablel extends Component

{  
    public $search = '';
      use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.kasbon-tablel',[
            "title" => "Admin | KASBON",
            "page" => "KASBON",
            "pembelian" =>  pembelian::with(['users', 'detail_pembelian.namaBarang', 'kasbon'])
            ->whereHas('users' , function( $query){
                $query->where('nama' , 'like' , '%'.$this->search.'%');
            })
           ->select('id_user') ->groupBy('id_user') 
            ->paginate(1),
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
