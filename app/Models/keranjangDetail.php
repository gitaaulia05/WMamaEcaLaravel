<?php

namespace App\Models;

use App\Models\barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keranjangDetail extends Model
{
    use HasFactory;
    public $table = 'keranjang_detail';
    public $primaryKey = 'id_detail_keranjang';
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_detail_keranjang',
        'id_barang'
    ];

    public function barang () :belongsTo
    {
        return $this->BelongsTo(barang::class, 'id_barang' , 'id_barang');
    }
}

