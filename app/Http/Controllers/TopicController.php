<?php

namespace App\Http\Controllers;
use App\Post;
use App\Topic;
use App\Topic_Post;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function  index(Topic $topic)
    {

//        //我的所有文章
//        $mypost=\Auth::user()->posts;
////        这个专题的所有文章
//        $topicAllPost=$topic->posts;
////      我的文章但是不在这个专题的
//        $lastpost=$mypost->diff($topicAllPost);
        $post1=Post::find(13);

//        dd($post1->PostTopic);

//
        $lastpost=Post::authpost(\Auth::id())->NotThisTopicPost($topic->id)->get();
//        dd($lastpost);

        $mypost=\Auth::user()->posts;
//        dd($mypost);
        $post=$topic->posts()->withcount(['zan','comment'])->paginate(4);
       return view('index/topic/index',compact('post','topic','lastpost'));
    }


    public  function  tou(Topic $topic)
    {
        $postid=request('post');
//        $post=Post::wherein('id',$postid);

        foreach($postid as $item)
        {
            $post= Topic_Post::firstOrCreate(['post_id'=>$item,'topic_id'=>$topic->id])
                ;
            $post->isshow=0;
            $post->save();
        }


//        dd($post1);
//        $topic->posts()->save($post1);
        return back()->with('session',"投稿成功!");

    }

}
