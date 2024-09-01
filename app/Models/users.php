<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class users extends Authenticatable
{
    use HasFactory, Notifiable;



    protected $fillable= [
        'id_user',
        'nama',
        'no_hp',
        'email',
        'alamat',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $table = 'users';
    protected $primary = 'id_user';
    protected $keyType = 'string';
    public $incrementing = false;
}
