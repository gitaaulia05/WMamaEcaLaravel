<?php

namespace App\Http\Livewire;

use App\Models\barang;
use Livewire\Component;
use App\Models\pembelian;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProfileTable extends Component
{
    public $search = '';
    use WithPagination;
    public function render()
    {
        return view('livewire.profile-table', [
            "title" => "PROFILE | USER",
            "data" => pembelian::with(['detail_pembelian.namaBarang' => function($query){
                    $query->where('nama_barang' , 'like' , '%'.$this->search.'%');
            }])->where('id_user' , Auth::id())->orderBy('created_at', 'desc')->paginate(10),

        ]);
    }

    public function updatingSearch()
    {
            $this->resetPage();
    }
}
