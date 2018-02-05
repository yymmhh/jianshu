<?php

namespace App\Admin\Controllers;

use App\Admin_Role;
use App\Adminuser;

class AdminController extends Controller
{



    //用户页面
    public function  user()
    {
        $user= Adminuser::all();

        return view('admin/home/user',compact('user'));
    }


    //用户详情页面
    public function  useradd(Adminuser $admin_user)
    {

        $role= Admin_Role::all();
        $myrole= $admin_user->roles;

        return view('admin/home/useradd',compact('admin_user','role','myrole'));
    }



    public  function index()

    {

        $admin=new Adminuser();
        $admin->name="1";
        $admin->password=Bcrypt(1);

        $admin->save();

    }

//给用户添加角色
    public function  addrole(Adminuser $admin_user)
    {

        //先获得我的所有角色
        $myrole= $admin_user->roles;
        $arr=request('roleck');
        //选中的角色
        $ckrole=Admin_Role::wherein('id',$arr)->get();
        //最后要添加的角
        $addrole=$ckrole->diff($myrole);
        //最后要删除的
        $delrole=$myrole->diff($ckrole);
        //循环添加进去
        foreach($addrole as $item){
            $admin_user->roles()->save($item);
        }



        foreach($delrole as $item){
            $admin_user->roles()->detach($item);
        }



        return back();

    }



}
