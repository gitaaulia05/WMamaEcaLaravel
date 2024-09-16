<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pembelian;
use Livewire\WithPagination;

class DetailKasbon extends Component
{
    use WithPagination;
    public  $id_user;
    public $search = '';
    public $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.detail-kasbon' ,[
            'title' => "Admin | Detail Data Kasbon",
            'page' => 'Detail Data Kasbon',
            'pembelian' => pembelian::with(['users', 'kasbon' ,'detail_pembelian.namaBarang' ])->where('id_user' , $this->id_user)->whereHas('kasbon' , function($query){
                $query->where('id_kasbon' , 'like' , '%'.$this->search.'%');
            })->paginate(10),
        ]);
    }


    public function updatingSearch()
    {
            $this->resetPage();
    }
}
