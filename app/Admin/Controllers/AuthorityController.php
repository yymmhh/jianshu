<?php

namespace App\Admin\Controllers;

use App\Admin_Authority;
use App\Adminuser;

class AuthorityController extends Controller
{


    //登陆页面
    public function authority()
    {
        $author= Admin_Authority::all();
        return view('admin/home/authority',compact('author'));
    }


    public function add()
    {
        return view('admin/home/authorityADD');
    }


}
