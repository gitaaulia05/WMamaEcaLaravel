<?php

namespace App\Http\Livewire;

use App\Models\barang;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardBarang extends Component
{
    public $search='';
    use WithPagination;
    public function render()
    {
        return view('livewire.dashboard-barang' , [
             'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data',
            'barang' => barang::where('nama_barang' , 'like' , '%'.$this->search.'%')->paginate(20),

        ]);
    }
}
