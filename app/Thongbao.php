<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongbao extends Model
{
    protected $table = 'thongbao';
    
    protected $fillable = [
        'id_user', 
        'id_tap', 
        'noidung', 
        'status', 
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tap(){
        return $this->belongsTo(Tap::class, 'id_tap');
    }
}
