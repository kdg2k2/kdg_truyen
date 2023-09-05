<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theodoi extends Model
{
    protected $table = 'theodoi';
    protected $fillable = [
        'id_truyen',
        'id_user',
    ];
    public $timestamps = false;

    public function truyen(){
        return $this->belongsTo(Truyen::class, 'id_truyen');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
