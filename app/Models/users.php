<?php

namespace App\Models;

use App\Models\pembelian;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    use HasFactory, Notifiable ;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable= [
        'id_user',
        'nama',
        'no_hp',
        'limit',
        'alamat',
        'password', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];





    public function pembelian(): HasMany
    {
        return $this->hasMany(pembelian::class, 'id_user', 'id_user');
    }

}
