<?php

namespace App;

use App\Main;
use \Illuminate\Database\Eloquent\Builder;

class Post extends Main
{

    protected  $table="post";
    public $fillable=['title','content','user_id'];


    public function  user()
    {
        return $this->belongsTo(\App\User::class,'user_id','id');
    }

    public function comment()
    {
        return $this->hasMany(\App\Comment::class,'post_id','id');
    }
    public function  zan()
    {
        return $this->hasMany(\App\Zan::class,'post_id','id');
    }


    public  function  topic()
    {

        return $this->beLongstoMany(\App\Topic::class,'topic_post','post_id','topic_id');
    }


    public   function  scopeauthpost(Builder $query,$uid){

        return $query->where('user_id',$uid);

    }


    public  function PostTopic()
    {
        return $this->hasMany(\App\Topic_Post::class,'post_id','id')->whereIn('isshow',['0','1']);
    }

    public  function scopeNotThisTopicPost(Builder $query,$topic_id)
    {


        return $query->doesntHave('PostTopic','and',function($q) use($topic_id){
            $q->where('topic_id',$topic_id);
        });
    }

    protected static function boot()
    {

        parent::boot();
        static::addGlobalscope('isok',function(Builder $buider){
            $buider->wherein('isok',[1,0]);
        });
    }



}

