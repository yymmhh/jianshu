<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected  $table="topic";

    public  function posts()

    {
        return $this->beLongstoMany(\App\Post::class,'topic_post','topic_id','post_id')->whereIn('isshow',[0,1]);
    }
}
