<?php

namespace App\Admin\Controllers;

use App\Admin_Authority;
use App\Admin_Role;
use App\Adminuser;

class RoleController extends Controller
{




    public function  role(Admin_Role $role)
    {
        $authiorys=Admin_Authority::all();
        $myauthiory=$role->authoritys;
        return view('/admin/home/roleadd',compact('role','authiorys','myauthiory'));
    }

    //角色页面
    public function index()
    {

//        $user=Admin_user::find(1);
//        $auth=Admin_Authority::find(1);
//        $authRole=$auth->role;
//        $userrole=$user->roles;
////        dd($userrole->contains($authRole));
//        dd($user->hasAuthority($auth));
//        dd(!!$authRole->intersect($userrole)->count());
//        $isok=false;
//        foreach($authRole as $item){
//            if($userrole->contains($item)){
//
//                $isok=true;
//                break;
//            }
//
//
//        }
//        dd($isok);

        $role= Admin_Role::all();
        return view('admin/home/role',compact('role'));


    }


    public  function  add(Admin_Role $role)
    {

           $ckAuthiortyID= request('authiorty');
        //如果一个都没有选的话,就把自己的所有权限都删除了
        if($ckAuthiortyID==null){
            //执行循环删除

                foreach($role->authoritys as $item){

                    $role->delAuthior($item);
                }

            return back();

        }
        $ckAuthiortys=Admin_Authority::wherein('id',$ckAuthiortyID)->get();


        $myAuthiortys=$role->authoritys;


        $addAuthiortys=$ckAuthiortys->diff($myAuthiortys);

        $delAuthiortys=$myAuthiortys->diff($ckAuthiortys);
//        dd($addAuthiortys);

        //执行循环添加

        if($addAuthiortys!=null){
            foreach($addAuthiortys as $item){
                $role->addAuthior($item);
            }
        }

        //执行循环删除
        if($delAuthiortys!=null){
            foreach($delAuthiortys as $item){

                $role->delAuthior($item);
            }
        }


        return back();
    }


    //权限添加页面

    public function roleAdd(){
//        dd(1);
        $authiorys=Admin_Authority::all();
        return view('/admin/home/addRole',compact('authiorys'));
    }


    public function roleStore(){
        $addRoleID=request("authiorty");

        $addRole= Admin_Authority::wherein('id',$addRoleID)->get();

        $name=request("name");
         $userid=   Admin_Role::create(compact('name'))->id;


        $myrole=Admin_Role::find($userid);

        $myAllrole=$myrole->authoritys()->get();



        foreach($addRole as $item){

            $myrole->addAuthior($item);

            echo "OK";
        }



        return redirect('admin/role')->with('session',"$name 添加成功");
//        dd($addRole);
    }



    public function  delete(Admin_Role $role){
        $role->delete();
        return redirect('admin/role')->with('session',"$role->name 删除成功");
    }
}
