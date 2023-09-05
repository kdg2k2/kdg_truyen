<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lichsu extends Model
{
    protected $table = 'lichsu';
    
    protected $fillable = [
        'id_tap', 
        'id_user', 
    ];

    public function tap(){
        return $this->belongsTo(Tap::class, 'id_tap');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
