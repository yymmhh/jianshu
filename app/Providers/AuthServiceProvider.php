<?php

namespace App\Providers;

use App\Admin_Authority;
use App\Adminuser;
use App\Post;
use App\User;
use App\Weather;
use  App\Api\Position;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Post' => 'App\Policies\AdminPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define("123",function(User $user,$post){

            dd($post);

        });



        //
        \View::composer('index/layout/topic',function($view){
        $topic=\App\Topic::all();
            $view->with('topic',$topic);

        });


            \View::composer('index/layout/main',function($view){
//                $postition=new Position();
//                $form= $postition->Get_Ip_From();
//                $city=$form["data"]["city"];
//                $time=date("Ymd");
//                //缓存的键是时间+城市
//                $weatherKey=$time.$city;
//                $info="";
//                //使用缓存技术来存储天气
//                if (Cache::has($weatherKey)) {
//                    //如果缓存中有就读取出来
//                    $info=Cache::get($weatherKey);
//                }else{
//
//                    $weather=$postition->weather($city);
//                    $fuck=collect($weather);
//                    $date=$fuck["date"];
//
//                    $city=$fuck["city"];
//
//                    $quality=$fuck["data"]["quality"];
//
//                    $wendu=$fuck["data"]["wendu"];
//
//                    $arr=[$date,$city,$quality,$wendu];
//                    //没有的话就添加到缓存中设置时间为一天
//                    Cache::put($weatherKey,$arr,1450);
//                }
////                $info=Cache::get($weatherKey);


//                $view->with('weather',$info);

                if(\Auth::check()){

                    $touPicture=\Auth::user()->touPicture;
                    $view->with('touPicture',$touPicture);
                }



            });




        Gate::define('userInfo',function($my,$user){

            return $my->id == $user->id;
        });






        //验证修改文章
        Gate::define('update-post', function ($user, $post) {
//            dd($user);
            return $user->id == $post;
        });

        //验证删除文章
        Gate::define('delete-post',function($user,$post){
//            dd(123);
//            dd($user);
            return $user->id == $post;
        });


        //后台的权限认证
        $Authoritys=Admin_Authority::all();

        foreach($Authoritys as $item){

            Gate::define($item->name,function(Adminuser $user) use ($item){


                return $user->hasAuthority($item);

            });


        }


    }
}
