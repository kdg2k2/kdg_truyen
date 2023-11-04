<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    protected $table = 'dislike_table';
    protected $fillable = [
        'id_truyen',
        'id_user',
    ];
    public $timestamps = false;
}
