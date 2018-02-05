<?php

namespace App\Admin\Controllers;

use App\Admin_Role;
use App\Admin_user;
use App\Post;
use App\Topic;
use App\Topic_Post;

class TopicController extends Controller
{


    public function  index()
    {
        $topic=Topic::all();
        return view('/admin/home/topic',compact('topic'));
    }


    public  function  show(Topic $topic)
    {
        //专题里面没有通过的文章
        $newPost=Topic_Post::where('isshow',0)
            ->where('topic_id',$topic->id)
            ->get();
        //新投稿的文章
        $newPosts=Post::find($newPost->pluck('post_id'))->all();
        //专题的所有文章
        $post=$topic->posts;

        $postid=$post->pluck('id');
        //状体通过的文章,得到的是关联关系表的对象
        $last=Topic_Post::wherein('post_id',$postid)
            ->where('topic_id',$topic->id)
            ->where('isshow',1)
            ->get();

        //从关联关系表中找出对应的文章
        $post=Post::wherein('id',$last->pluck('post_id'))->get();


            return view('/admin/home/topicpost',compact('post','topic','newPosts'));
    }




    //文章通过专题的深黑
    public function  ok(Post $post,Topic $topic)
    {
        $topic_post=Topic_Post::where('post_id',$post->id)
            ->where('topic_id',$topic->id)
            ->update([
                'isshow'=>'1'
            ])
        ;
//        $topic_post->isshow=-1;
//        $topic_post->save();
        return back();
    }



    public function  no(Post $post,Topic $topic)
    {
//        dd($post,$topic);

        $topic_post=Topic_Post::where('post_id',$post->id)
            ->where('topic_id',$topic->id)
            ->update([
                'isshow'=>'-1'
            ])
            ;
//        $topic_post->isshow=-1;
//        $topic_post->save();
        return back();

    }


}
