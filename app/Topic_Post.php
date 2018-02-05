<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic_Post extends Model
{
    protected  $table='topic_post';

    public  $fillable=['post_id','topic_id'];
}
