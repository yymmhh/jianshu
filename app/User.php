<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Fan;
class User extends Authenticatable
{
    protected $table="users";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //获取用户的二段信息,签名
    public function  info()
    {
        return $this->hasOne(\App\UserInfo::class,'user_id','id');
    }


    public function  haszan($post)
    {
//        dd($post);
//

        return $this->hasMany(\App\Zan::class,'user_id','id') ->where('post_id',$post->id);
    }

    public function  posts()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function fan()
    {
        return $this->hasMany(Fan::class,'star_id','id');
    }
    public  function  star()
    {

//        return $this->hasMany(Fan::class,'fan_id','id');
        return $this->hasMany(Fan::class,'fan_id','id');
    }

    public  function hasfan($star)
    {
        return $this->hasOne(Fan::class,'fan_id','id')->where('star_id',$star->id);

    }


    public function notices()
    {
        return $this->belongsToMany(\App\Notice::class, 'notice_user', 'user_id', 'notice_id')

            ->withPivot(['user_id', 'notice_id']);
    }

    /*
    * 增加通知
    */
    public function addNotice($notice)
    {
        return $this->notices()->save($notice);
    }

    /*
     * 减少通知
     */
    public function deleteNotice($notice)
    {
        return $this->notices()->detach($notice);
    }





}
