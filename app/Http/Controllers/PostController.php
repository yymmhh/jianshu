<?php

namespace App\Http\Controllers;

use App\Api\M3Result;
use App\Api\Position;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{



    public function  file(){

        return view('index/post/file');
    }

    public function  filego(Request $request){

        $wenjian= $request->file('file');
        if ($wenjian->isValid()) {

            //获取文件的原文件名 包括扩展名
            $yuanname= $wenjian->getClientOriginalName();

            //获取文件的扩展名
            $kuoname=$wenjian->getClientOriginalExtension();

            //获取文件的类型
            $type=$wenjian->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path=$wenjian->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename=date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$kuoname;
            //保存文件          配置文件存放文件的名字  ，文件名，路径
            $bool= Storage::disk('tou')->put($filename,file_get_contents($path));
            return back();
        }
    }


//获取天气的接口
    public  function wealther($position){

        $time=date("Ymd");
        $m3Result=new M3Result();
        //缓存的键是时间+城市

        $weatherKey=$time.$position;
//        $arr=[];
//        Cache::pull($weatherKey);
        //使用缓存技术来存储天气
        if (Cache::has($weatherKey)) {
//            echo "有";
            //如果缓存中有就读取出来
            $arr=Cache::get($weatherKey);
        }else{
//            echo  "没有";
            $wealther=new Position();
            $tianqi= $wealther->weather($position);
//        dd($tianqi["data"]);


            $arr=["wendu"=>$tianqi["data"]["wendu"],
                "quality"=>$tianqi["data"]["quality"],
                "city"=>$tianqi["city"]

            ];


            $m3Result->arr=$arr;


            Cache::put($weatherKey,$arr,1450);
        }
//                $info=Cache::get($weatherKey);


        $m3Result->msg="";
        $m3Result->status=0;
        $m3Result->arr=$arr;
//        dd($m3Result);
        return $m3Result->toJson();
//        dd($m3Result);



    }


    public function index()
    {


//        dd(123);
//        dd($weather);

//        if (\Gate::allows('userInfo', $post)) {
//            // 当前用户可以更新文章...
//        }
        $post=Post::orderby('created_at','desc')->withCount(['zan','comment'])->paginate(5);



        if(\Auth::check()){

            $touPicture=\Auth::user()->touPicture;
        }else{
            $touPicture=null;
        }




        return view('index/post/index',compact('post','touPicture'));
    }

    /**
     * 创建新文章表单页面
     *
     * @return Response
     */
    public function create()
    {
        return view('index/post/create');
    }

    /**
     * 将新创建的文章存储到存储器
     *
     * @param Request $request
     * @return Response
     */
    public function store()
    {



        $this->validate(request(),[
            'title'=>'required|string|max:20|min:4',
            'content'=>'required|string|min:10'

        ],[],[
            'title'=>'标题',
            'content'=>'文本'
        ]);



            $user_id=\Auth::id();


        $post=array_merge(request(['title','content']),compact('user_id'));

//        dd($post);
         Post::create($post);
        return redirect('post')->with('session','文章发表成功!');

    }

    /**
     * 显示指定文章
     *
     * @param int $id
     * @return Response
     */
    public function show($post)
    {



//        for($i=0;$i<100;$i++){
//            $key="post".$i;
//            Cache::pull($key);
//        }
//
//        dd("Stop");
//        dd($post);
//        dd($post->user);
//        $post->load('user');



        $key="post".$post;
//        dd(Cache::get($key));
        $lastPost="";
        //文章列表的缓存,每篇文章都进行缓存
        //然后在修改文章的时候进行销毁缓存
        if(Cache::has($key)){

//            var_dump("在");
            $lastPost=Cache::get($key);
        }else{

            //把文章的内容,和作者的姓名加入缓存了
            $wen=Post::find($post);
            $name=$wen->user->name;
            $wen->name=$name;
//            dd($wen);
            Cache::put($key,$wen,99999);
            $lastPost=$wen;
        }



        //对文章的评论进行缓存
        //评论的键值对
        $commentkey="postComment".$post;
        $lastComment="";

//        Cache::pull($commentkey);
        if(Cache::has($commentkey)){


            $lastComment=Cache::get($commentkey);
        }else{

            $comment=$lastPost->comment;
            $postComment=[];
            //这边获取到的评论都是一个集合
            foreach ($comment as $item) {
                $item->name=$item->user->name;


                array_push($postComment,$item);
            }

            Cache::put($commentkey,$postComment,99999);
            $lastComment=$postComment;
        }



       return view('index/post/show',[
           'post'=>$lastPost,'comment'=>$lastComment
       ]);
    }

    /**
     * 显示编辑指定文章的表单页面
     *
     * @param int $id
     * @return Response
     */
    public function edit(Post $post)
    {
//        dd($post);
        if (\Gate::allows('update-post',$post->user_id)) {
            return view('index/post/update',compact('post'));
        }else{
            return redirect('post')->withErrors("别瞎几把搞");
        }


    }

    /**
     * 在存储器中更新指定文章
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request,Post $post)
    {


        $validate=\Validator::make($request->input(),[

            'title'=>'required|string|max:20|min:4',
            'content'=>'required|string|min:10'
        ]);


        if($validate->fails()){
            return back()->withInput();
        }

        $post->title=request('title');
        $post->content=request('content');
        $post->save();
         $key="post".$post->id;
        Cache::pull($key);
        return redirect('post')->with('session','修改成功!');

    }

    /**
     * 从存储器中移除指定文章
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect('post')->with('session','删除成功!');
    }





}
