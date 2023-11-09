<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'path', 
        'token', 
        'token_created_at', 
        'role'
    ];
    public $timestamps = false;

    public function binhluan(){
        return $this->hasMany(Binhluan::class, 'id_user');
    }

    public function theodoi(){
        return $this->hasMany(Theodoi::class, 'id_user');
    }

    public function lichsu(){
        return $this->hasMany(Lichsu::class, 'id_user');
    }
}
