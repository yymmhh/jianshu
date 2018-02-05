<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_Authority extends Model
{
    public $table="admin_authority";
    public $fillable=['name'];

    //我这个权限谁有,哪些角色有我这个权限
    public  function  role()
    {

        return $this->belongsToMany(\App\Admin_Role::class,'admin_role_authority','authority_id','role_id');


    }

}
