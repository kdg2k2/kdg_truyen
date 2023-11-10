<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tacgia extends Model
{
    protected $table='tacgia';
    protected $fillable=[
        'tentacgia',
    ];
    public $timestamps = false;
    
    public function truyen_tacgia(){
        return $this->belongsTo(Truyen_tacgia::class, 'id_tacgia');
    }
}
