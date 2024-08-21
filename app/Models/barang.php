<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "barang";
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'stok_barang',
        'deks_barang',
    ];

  
    
    public function JenisBarang(){
        return $this->hasMany(JenisBarang::class, 'id_barang', 'id_barang' );
    }

}



