<?php

namespace App\Models;

use App\Models\barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detail_pembelian extends Model
{
    use HasFactory;

    protected $table = "detail_pembelian";
    protected $primaryKey = "id_det_pem";
    protected $keyType = "string";

    protected $fillable = [
        'id_det_pem',
        'id_pembelian',
        'id_barang',
        'kuantitas',
        'harga_perProduk',
        'slug'
    ];



    public function namaBarang(): belongsTo 
    {
        return $this->BelongsTo(barang::class , 'id_barang' , 'id_barang');
    }

    public function pembelian(): belongsTo
    {
        return $this->BelongsTo(pembelian::class , 'id_pembelian' ,  'id_pembelian');
    }



}
