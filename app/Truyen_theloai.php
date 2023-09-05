<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truyen_theloai extends Model
{
    protected $table = 'truyen_theloai';
    protected $fillable = [
        'id_truyen',
        'id_theloai',
    ];
    public $timestamps = false;

    public function truyen(){
        return $this->belongsTo(Truyen::class, 'id_truyen');
    }

    public function theloai(){
        return $this->belongsTo(Truyen_theloai::class, 'id_theloai');
    }
}
