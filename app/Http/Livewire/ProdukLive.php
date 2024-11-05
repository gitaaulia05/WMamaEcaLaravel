<?php

namespace App\Http\Livewire;

use App\Models\barang;
use Livewire\Component;
use Livewire\WithPagination;

class ProdukLive extends Component
{

    public $search = '';
    use withPagination;

    // protected $paginationTheme = "tailwind";

    public function render()
    {
        return view('livewire.produk-live' , [
            "title" => 'Katalog Produk',
                "data" => barang::where('nama_barang' , 'like' , '%'.$this->search.'%')->orderBy('is_arsip' , 'asc')->paginate(5),
                
        ]);
    }
}
