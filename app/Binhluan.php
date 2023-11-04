<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    protected $table = 'binhluan';
    
    protected $fillable = [
        'id_truyen', 
        'id_user', 
        // 'parent_id', 
        'noidung', 
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function truyen(){
        return $this->belongsTo(Truyen::class, 'id_truyen');
    }

    // public function replies(){
    //     return $this->hasMany(Binhluan::class, 'parent_id');
    // }
}
