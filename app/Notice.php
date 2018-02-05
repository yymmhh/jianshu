<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected  $table="notice";

    public  $fillable=['title','content'];
}
