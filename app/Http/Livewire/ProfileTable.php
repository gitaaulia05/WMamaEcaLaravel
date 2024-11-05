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
           // Controller atau Livewire Component
            "data" => pembelian::where('id_user', Auth::id())
            ->whereHas('detail_pembelian.namaBarang', function($query) {
                $query->where('nama_barang', 'like', '%' . $this->search . '%');
            })
            ->with(['detail_pembelian.namaBarang'])
            ->orderBy('created_at', 'desc')
            ->paginate(20),

        ]);
    }

    public function updatingSearch()
    {
            $this->resetPage();
    }
}
