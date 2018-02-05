<?php

namespace App\Admin\Controllers;

use App\Admin_user;
use App\Post;
use App\Zan;

use Illuminate\Http\Request;
use App\User;

class PostController extends Controller
{

    //登陆页面
    public function index()
    {

//        dd(\Auth::user());
//        dd(123);

        $post= Post::find(5);
//        dd($post);
//        $this->authorize('yuan',$post);




        $post=Post::withoutGlobalScope('isok')->get();
        $post=$post->whereIn('isok',0);
        return view('admin/post/index',compact('post'));
    }

    //通过文章
    public function postyes(Post $post)
    {


        $post->isok=1;
        $post->save();
        return [
            'error'=>0,
            'mes'=>''

        ];
    }


    //拒绝文章
    public function  postno(Post $post)
    {
        $post->isok=-1;
        $post->save();
        return [
            'error'=>0,
            'mes'=>''

        ];
    }






}
