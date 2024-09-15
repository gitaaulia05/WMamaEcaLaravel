<?php



use Livewire\Component;
use App\Models\pembelian;
use Livewire\WithPagination;

class KasbonTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.kasbon-table', [
            "title" => "Admin | KASBON",
            "page" => "KASBON",
            "pembelian" => pembelian::with(['users' , 'detail_pembelian.namaBarang' , 'kasbon'])->select('id_user')->groupBy('id_user')->paginate(1),
        ]);
    }
}
