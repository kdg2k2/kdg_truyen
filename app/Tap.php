<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tap extends Model
{
    protected $table = 'tap';
    protected $fillable = [
        'tentap',
        'id_truyen',
        'path',
    ];

    public function truyen(){
        return $this->belongsTo(Truyen::class, 'id_truyen');
    }
}
