<?php

namespace App\Admin\Controllers;

use App\Post;

class LoginController extends Controller
{

    //登陆页面
    public function index()
    {


        return view('admin/login/index');
    }

    //登陆行为
    public function  store()
    {
        $name=request('name');
        $password=request('password');
//        ->attempt(['name'=>$name,'password'=>$password]
        $user=request(['name','password']);
//        dd($user);
        if(\Auth::guard("admin")->attempt($user))
        {

//            dd(\Auth::user());
            return redirect('admin/post/index');
        }else{
            return back();
        }

    }





}
