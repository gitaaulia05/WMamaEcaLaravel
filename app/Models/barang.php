<?php

namespace App\Models;

use App\Models\keranjangDetail;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory, Sluggable;

    protected $table = "barang";
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'slug',
        'img',
        'stok_barang',
        'harga_barang',
        'is_arsip',
        'deks_barang',
    ];

    public function JenisBarang()
    {
        return $this->hasMany(JenisBarang::class, 'id_barang', 'id_barang');
    }

    public function keranjangDetail()
    {
        return $this->hasMany(keranjangDetail::class, 'id_barang', 'id_barang');
    }

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'nama_barang'
            ]
        ];
    }
}
