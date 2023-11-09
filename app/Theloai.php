<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    protected $table = 'theloai';
    protected $fillable = [
        'tentheloai',
        'mota',
    ];
    public $timestamps = false;
    
    public function truyen_theloai(){
        return $this->belongsTo(Truyen_theloai::class, 'id_theloai');
    }
}
