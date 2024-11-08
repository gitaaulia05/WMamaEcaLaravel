<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\detail_pembelian;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon;

class LaporanPenjualanLive extends Component
{

    public $search = '';
    public $filter;
    public $batasTanggal;
    use withPagination;

    protected $paginationTheme = 'bootstrap';


        public function tanggalFilter($data){
            // dd($data);
        $this->filter =  Carbon::parse($data);
      $start = $this->filter;
        $this->batasTanggal = $start->copy()->addWeeks(1);
       
        // Carbon::parse($this->filter->addWeeks(1));

        $dp = detail_pembelian::whereBetween('updated_at' ,[$this->filter, $this->batasTanggal])->get();
      
        }

    public function render()
    {
        return view('livewire.laporan-penjualan-live' , [
            'title' => 'ADMIN | Laporan Penjualan',
            'page' => 'Laporan Penjualan',
          'data' => detail_pembelian::with('namaBarang')
    ->when($this->filter, function ($query) {
      $query->whereBetween('updated_at', [$this->filter, $this->batasTanggal]);
    })->groupBy('id_barang')
    ->select('id_barang', DB::raw('SUM(kuantitas) as total'))
    ->paginate(20),

            'tanggal' => carbon::now(),
            'bulanLalu'     => carbon::now()->subMonth(1),
        ]);
    }

  
   
}
