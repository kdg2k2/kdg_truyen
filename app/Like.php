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
}
