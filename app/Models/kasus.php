<?php

namespace App\Models;

use App\Models\kasbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\hasOneThrough; 

class kasus extends Model
{
    use HasFactory;
    protected $table= 'kasus';
    protected $fillable =[
        'id_kasus',
        'nama',
        'slug',
        'id_user'
    ];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => ['user.nama']
            ]
        ];
    }


    // public function users() {
    //     return $this->hasOneThrough(
    //         User::class, // The related model
    //         Kasus::class, // The intermediate model
    //         'id_kasus', // Foreign key on the 'kasus' table...
    //         'id_user', // Foreign key on the 'users' table...
    //         'id_kasus', // Local key on the 'kasbon' table...
    //         'id_user'  // Local key on the 'kasus' table...
    //     );
    // }

    public function kasbons() : hasMany{
        return $this->hasMany(kasbon::class, 'id_kasus' , 'id_kasus');
    }
}

