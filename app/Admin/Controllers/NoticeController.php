<?php

namespace App\Admin\Controllers;

use App\Admin_Role;

use App\Notice;
use App\Post;
use App\Topic;
use App\Topic_Post;

class NoticeController extends Controller
{


    public function  index()
    {
        $notice=Notice::all();
        return view('/admin/home/noticp',compact('notice'));
    }


    public function add()
    {

        return view("/admin/home/noticeAdd");
    }


    public function  store()
    {
       $title=request('title');
       $content=request('content');

        $notice= Notice::create(compact('title','content'));


        dispatch(new  \App\Jobs\SendMessage($notice));


        return back();
    }




}
