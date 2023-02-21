<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'password', 'role',
    ];
    // public function siswas()
    // {
    //     return $this->hasOne(Siswa::class, 'user_id', 'id');
    // }

    // public function Siswas()
    // {
    //     return $this->belongsToMany(Siswa::cla);
    // }
    protected $hidden = array('remember_token');
}
