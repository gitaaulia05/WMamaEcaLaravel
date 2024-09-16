<?php

namespace App\Http\Livewire;

use App\Models\kasbon;
use Livewire\Component;
use App\Models\pembelian;
use App\Models\detailKasbon;
use Livewire\WithPagination;

class DetailRinciLive extends Component
{   

     public $search = '';
     use WithPagination;
     public $slug;
    public $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.detail-rinci-live' , [
            'title' => "Admin | Detail Data Kasbon",
            'page' => 'Detail Data Kasbon',
            'data' => kasbon::with(['detKasbon'=> function($query) {
                    $query->orderBy('created_at' , 'desc');
                    $query->where('id_det_kasbon' , 'like' ,'%'.$this->search.'%');
            } , 'pembelian.users'])->where('slug' , $this->slug)->first(),

        'pembelian' => pembelian::with(['detail_pembelian.namaBarang' , 'users'])->where('slug' , $this->slug)->first(),
            
        ]);
    }

    public function updatingSearch()
    {
            $this->resetPage();
    }

}
