<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    protected $table='truyen';
    protected $fillable=[
        'tentruyen',
        'tenkhac',
        'status',
        'mota',
        'path',
        'slug',
    ];

    public function tap(){
        return $this->hasMany(Tap::class, 'id_truyen');
    }
    
    public function binhluan(){
        return $this->hasMany(Binhluan::class, 'id_truyen');
    }
    
    public function theodoi(){
        return $this->hasMany(Theodoi::class, 'id_truyen');
    }

    public function like(){
        return $this->hasMany(Like::class, 'id_truyen');
    }

    public function dislike(){
        return $this->hasMany(Dislike::class, 'id_truyen');
    }

    public function truyen_theloai(){
        return $this->hasMany(Truyen_theloai::class, 'id_truyen');
    }

    public function truyen_tacgia(){
        return $this->hasMany(Truyen_tacgia::class, 'id_truyen');
    }
}
