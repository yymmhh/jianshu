<?php

namespace App;

use \App\Main;

class Comment extends Main
{
    protected $table='comment';
    protected $fillable=['user_id','post_id','content'];

    public function  user()
    {
        return $this->belongsTo(\App\User::class,'user_id','id');
    }
}
