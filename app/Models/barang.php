<?php

namespace App\Models;

// use sluggable;
use App\Models\keranjangDetail;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{

    use HasFactory;
    use Sluggable;
    public $table = "barang";
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'slug',
        // 'img',
        'nama_barang',
        'stok_barang',
        'harga_barang',
        'is_arsip',
        'deks_barang',
       
    ];

  
    
    public function JenisBarang(){
        return $this->hasMany(JenisBarang::class, 'id_barang', 'id_barang' );
    }

    public function keranjangDetail(){
        return $this->hasMany(keranjangDetail::class, 'id_barang', 'id_barang' );
    }

    // BIKIN SLUG DISINI 

    public function sluggable() : array {
        return [
            'slug' => [
                'source' =>'nama_barang'
            ]
        ];
    }


}



