<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like_table';
    protected $fillable = [
        'id_truyen',
        'id_user',
    ];
    public $timestamps = false;

    public function truyen(){
        return $this->belongsTo('App\Truyen', 'id_truyen', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
