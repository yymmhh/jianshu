<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $table='fans';

    public  $fillable=['star_id','fan_id'];
}
