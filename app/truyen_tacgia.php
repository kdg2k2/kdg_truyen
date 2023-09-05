<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truyen_tacgia extends Model
{
    protected $table = 'truyen_tacgia';
    protected $fillable = [
        'id_truyen',
        'id_tacgia',
    ];
    public $timestamps = false;

    public function truyen(){
        return $this->belongsTo(Truyen::class, 'id_truyen');
    }

    public function tacgia(){
        return $this->belongsTo(Tacgia::class, 'id_tacgia');
    }
}
