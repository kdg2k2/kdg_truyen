<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tacgia extends Model
{
    protected $table='tacgia';
    protected $fillable=[
        'tentacgia',
    ];

    // public function Truyen(){
    //     return $this->belongsToMany(Truyen::class, 'truyen_tacgia', 'id_tacgia', 'id_truyen');
    // }

    public function truyen_tacgia(){
        return $this->belongsTo(Truyen_tacgia::class, 'id_tacgia');
    }
}
