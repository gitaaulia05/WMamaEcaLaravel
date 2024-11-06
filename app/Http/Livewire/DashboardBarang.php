<?php

namespace App\Http\Livewire;

use App\Models\barang;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardBarang extends Component
{
    public $search='';

    public $stokBarang;
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function mount(){
        $this->stokBarang =  0;
     
        }

        public function toggleStokBarang()
{
    $this->stokBarang = $this->stokBarang ? 1 : 0;
}
    public function render()
    {
        
        return view('livewire.dashboard-barang' , [
             'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data',
            'barang' => barang::when($this->search, function($query){
                    $query->where('nama_barang' , 'like' , '%'.$this->search.'%');
            })->when($this->stokBarang, function($query){
                $query->where('is_arsip' , 'like' , '%'.$this->stokBarang.'%');
            })->paginate(20),

        ]);
    }

    
}
