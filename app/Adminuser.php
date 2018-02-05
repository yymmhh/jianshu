<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Adminuser extends Authenticatable
{
    public $table="admin_user";
    public $fillable=['name','password'];






    public function roles()
    {
        return $this->beLongsTOMany(\App\Admin_Role::class,'admin_user_role','user_id','role_id');

    }

    public  function  hasrole($role)
    {
//        dd($role);
//        return !!$role->intersect($this->roles)->count();
        return !!$this->roles()->get()->intersect($role)->count();
    }


    public  function hasAuthority($authority)
    {

        return $this->hasrole($authority->role);
    }

}
