<?php

namespace App\Http\Livewire;

use App\Models\kasbon;
use Livewire\Component;
use App\Models\pembelian;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class KasbonTable extends Component

{  
    public $search = '';
      use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.kasbon-tablel',[
            "title" => "Admin | KASBON",
            "page" => "KASBON",
            "pembelian" =>  pembelian::with(['users', 'detail_pembelian.namaBarang'])
            ->whereHas('users' , function( $query){
                $query->where('nama' , 'like' , '%'.$this->search.'%');
            })
           ->select('id_user' )->distinct('pembelian.id_user')
            ->paginate(10),
            
            
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
