<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use  App\Api\Position;

class PostController extends Controller
{
    /**
     * 显示文章列表.
     *
     * @return Response
     */
    public function index()
    {


//        dd($weather);

//        if (\Gate::allows('userInfo', $post)) {
//            // 当前用户可以更新文章...
//        }

        if(\Auth::check()){

            $touPicture=\Auth::user()->touPicture;
        }else{
            $touPicture=null;
        }

        $post=Post::orderby('created_at','desc')->withCount(['zan','comment'])->paginate(5);



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
    public function show(Post $post)
    {

//        dd($post->user);
        $post->load('user');

       $comment=$post->comment;
        $comment->load('user');
       return view('index/post/show',compact('post','comment'));
    }

    /**
     * 显示编辑指定文章的表单页面
     *
     * @param int $id
     * @return Response
     */
    public function edit(Post $post)
    {
        if (\Gate::allows('update-post',$post)) {
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
