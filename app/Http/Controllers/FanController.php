<?php

namespace App\Http\Controllers;

use App\Post;
use App\Zan;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
class FanController extends Controller
{

    //个人页面
    public function index(User $user)
    {


        $touPicture=$user->touPicture;
        $userInfo=$user->info;
        $fanuserid= $user->fan;

        $fanuser=User::wherein('id',$fanuserid->pluck('fan_id'))->get();


        $staruserid=$user->star;

        $staruser=User::wherein('id',$staruserid->pluck('star_id'))->get();
//        dd($staruser);
        $post=$user->posts()->withcount(['zan','comment'])->get();
//        dd($post);
        return view('index/user/index',compact('user','userInfo','post','fanuser','staruser','touPicture'));
    }

    public  function fan(User $user)
    {
        $arr=[
            'fan_id'=>\Auth::id(),
            'star_id'=>$user->id

        ];
//        dd($arr);
        \App\Fan::firstorcreate($arr);

        return [
            'error'=>0,
            'mes'=>''

        ];

    }

    public  function  ufan(User $user)
    {

//        dd(13);
//        $arr=\App\Fan::where('fan_id',\Auth::id())
//        ->where('star_id',$user->id)->get();
//



        \App\Fan::where('fan_id',\Auth::id())
            ->where('star_id',$user->id)
            ->delete();
        return [
            'error'=>0,
            'mes'=>''

        ];
    }




}
