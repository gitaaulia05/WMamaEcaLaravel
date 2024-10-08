<?php

namespace App\Models;

 use Cviebrock\EloquentSluggable\Sluggable;

use App\Models\kasbon;
use App\Models\users;
use App\Models\detail_pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pembelian extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = "pembelian";
    protected $primaryKey = "id_pembelian";
    protected $keyType = "string";

    protected $fillable = [
        'id_pembelian',
        'id_user',
        'slug',
        'total_bayar',
    ];
    public function users(): belongsTo
    {
        return $this->BelongsTo(users::class , 'id_user' , 'id_user');
    }

    public function sluggable() : array {
        return [
            'slug' => [
                'source' =>'users.nama'
            ]
        ];
    }

    public function kasbon() : hasMany{
        return $this->hasMany(kasbon::class , 'id_pembelian' , 'id_pembelian');
    }


    public function detail_pembelian() : hasMany {
        return $this->hasMany(
            detail_pembelian::class, 'id_pembelian' ,'id_pembelian'
        );
}

   

}