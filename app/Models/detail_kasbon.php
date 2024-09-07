<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detail_kasbon extends Model
{
    use HasFactory;
    protected $table = "detail_kasbon";
    protected $primaryKey = "id_det_kasbon";
    protected $keyType = "string";

    protected $fillable = [
        'id_det_kasbon',
        'id_kasbon',
        'cicilan_ke',
        'total_bayar',
        'tanggal_bayar',
        'is_lunas'
    ];

    public function kasbon(): belongsTo
    {
        return $this->belongsTo(kasbon::class , 'id_kasbon' , 'id_kasbon');
    }

}
