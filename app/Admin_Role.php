<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_Role extends Model
{
    public $table="admin_role";
    public $fillable=['name'];

    //角色有多少权限
    public function  authoritys()
    {
        return $this->belongsToMany(\App\Admin_Authority::class,'admin_role_authority','role_id','authority_id');

    }

//    public  function hasAuthority($authority)
//    {
//
//        return $this->authoritys()->contains($authority);
//    }


    //添加权限

    public function  addAuthior($Authior)
    {

        return $this->authoritys()->save($Authior);
    }
    //删除权限

    public function  delAuthior($Authior)
    {
        return $this->authoritys()->detach($Authior);
    }
}
