<?php

namespace App\Http\Controllers;

use App\Post;
use App\UserInfo;
use App\Zan;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    //登陆页面
    public function index()
    {
        return view('index/login/index');
    }

   //注册页面
    public function create()
    {
        return view('index/login/regiest');
    }

    /**
     * 将新创建的文章存储到存储器
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd(request('email'));
        $email=request('email');
        $password=request('password');
        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
            // 认证通过...
            return redirect('post');
        }else{
            return back()->withErrors("登陆失败!");
        }
    }

    /**
     * 显示指定文章
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {


    }

    /**
     * 显示编辑指定文章的表单页面
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 在存储器中更新指定文章
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {


        $password=Bcrypt(request('password'));
        $name=request('name');
        $email=request('email');

         $arr=compact('password','name','email');


        $validate=\Validator::make($request->input(),[
            'name'=>'required|string|max:20|min:2',
            'email' => 'unique:users,email'
        ]);


        if($validate->fails()){
            return back()->withInput()->withErrors("这个邮箱被人注册过了!");
        }




            $user= User::create($arr);
            UserInfo::create(["user_id"=>$user->id]);
            return redirect('/login')->with("session","注册成功!");





    }

    /**
     * 从存储器中移除指定文章
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public  function  zan(Post $post)
    {
        $user_id=\Auth::id();
        $post_id=$post->id;
        Zan::firstOrCreate(compact(['user_id','post_id']));
        return [
            'error'=>0,
            'mes'=>''
        ];
    }


    public  function  uzan(Post $post)
    {


        $user_id=\Auth::id();
        $post_id=$post->id
        |
        
        Zan::where([
            'user_id'=>$user_id, 'post_id'=>$post->id
        ])->delete();

        return [
            'error'=>0,
            'mes'=>''
        ];


    }

    public  function comment(Post $post)
    {


        $arr=[
            'user_id'=>\Auth::id(),
            'post_id'=>$post->id,
            'content'=>request('content')

        ];

        //评论完了之后要销毁缓存
        $commentkey="postComment".$post->id;
//        dd($commentkey);
        Cache::pull($commentkey);

        Comment::create($arr);





        return back();
    }


    //个人设置页面
    public function  updateUser(User $user){

        if (\Gate::allows('userInfo', $user)) {
            $info=\Auth::user()->info;

            $touPicture=\Auth::user()->touPicture;

            $name=\Auth::user()->name;
            return view("index/user/update",compact('touPicture','info','name'));
        }else{
            return back()->withErrors("请别瞎搞!");
        }

    }

    //提交修改

    public function updateStore(Request $request)
    {
        $wenjian= $request->file('file');

        //当没改变文件就是为空的时候
        if($wenjian!=null){


            if ($wenjian->isValid()) {

                //获取文件的原文件名 包括扩展名
                $yuanname= $wenjian->getClientOriginalName();

                //获取文件的扩展名
                $kuoname=$wenjian->getClientOriginalExtension();
                if($kuoname!="jpg"&&$kuoname!="png" &&$kuoname!="gif" &&$kuoname!="bmp"){

                    return back()->withErrors("我做过验证了!!");
                }

                //获取文件的类型
                $type=$wenjian->getClientMimeType();

                //获取文件的绝对路径，但是获取到的在本地不能打开
                $path=$wenjian->getRealPath();

                //要保存的文件名 时间+扩展名
                $filename='Tou'. date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$kuoname;
                //保存文件          配置文件存放文件的名字  ，文件名，路径
                $bool= Storage::disk('tou')->put($filename,file_get_contents($path));

                $user=User::find(\Auth::id());
                $user->touPicture=$filename;
                $user->save();


                return back()->with('session',"修改成功");
            }
        }else{


            $autograph=$request->autograph;
            $job=$request->job;

            $info=\Auth::user()->info;

            $info->job=$job;
            $info->autograph=$autograph;
            $info->save();
            return back()->with('session',"修改成功!");

        }

    }


}
