<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\detail_pembelian;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class LaporanPenjualanLive extends Component
{

    public $search = '';
    use withPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.laporan-penjualan-live' , [
            'title' => 'ADMIN | Laporan Penjualan',
            'page' => 'Laporan Penjualan',
            'data' => detail_pembelian::with('namaBarang')->where('created_at' ,'like' , '%'.$this->search.'%' )->orWhere('updated_at' ,'like' , '%'.$this->search.'%')->select('id_barang' ,  DB::raw('SUM(kuantitas) as total'))->groupBy('id_barang')->paginate(20),
        ]);
    }
}
