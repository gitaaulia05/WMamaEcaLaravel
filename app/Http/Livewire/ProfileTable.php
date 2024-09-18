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
            "data" => pembelian::with(['detail_pembelian.namaBarang' ])->where('id_user' , Auth::id())->paginate(10),

        ]);
    }

    public function updatingSearch()
    {
            $this->resetPage();
    }
}
