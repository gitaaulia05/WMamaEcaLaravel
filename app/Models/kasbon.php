<?php

namespace App\Models;

use App\Models\kasus;

 use Cviebrock\EloquentSluggable\Sluggable;

use App\Models\users;
use App\Models\pembelian;
use App\Models\detailKasbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class kasbon extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table= 'kasbon';
    protected $primaryKey= 'id_kasbon';
    protected $keyType = 'string';
    protected $fillable = [
        'id_kasbon',
        'id_pembelian',
        'slug',
        'total_kasbon',
    
    ];


    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => ['pembelian.slug']
            ]
        ];
    }

    public function pembelian():belongsTo{
        return $this->belongsTo(pembelian::class , 'id_pembelian' , 'id_pembelian');
    }

    public function detKasbon()
    {
        return $this->HasMany(detailKasbon::class, 'id_kasbon' ,'id_kasbon');
    }
    
}
