<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Post;
use App\Zan;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
class NoticeController extends Controller
{


    public function index()
    {

        $notice=\Auth::user()->notices;
        return view("index/notice/index",compact('notice'));


    }






}
