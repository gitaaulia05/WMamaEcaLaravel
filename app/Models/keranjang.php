<?php

namespace App\Models;

use App\Models\keranjangDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keranjang extends Model
{
    use HasFactory;
    public $table = 'keranjang';
    public $primaryKey = 'id_keranjang';
    protected $keyType = 'string';

    protected $fillable = [
        'id_keranjang',
        'id_barang'
    ];

    public function keranjangDetail(): hasMany
    {
        return $this->HasMany(keranjangDetail::class, 'id_keranjang' ,'id_keranjang');
    }
}
