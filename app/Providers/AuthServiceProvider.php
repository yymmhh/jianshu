<?php

namespace App\Providers;

use App\Admin_Authority;
use App\Adminuser;
use App\User;
use App\Weather;
use  App\Api\Position;
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

        //
        \View::composer('index/layout/topic',function($view){
        $topic=\App\Topic::all();
            $view->with('topic',$topic);

        });


            \View::composer('index/layout/main',function($view){
                $postition=new Position();
                $form= $postition->Get_Ip_From();
                $city=$form["data"]["city"];
                $time=date("Ymd");
//                dd($city);
                $info= Weather::where('date',$time)
                    ->where('city',$city)
                    ->get();
//                dd($isok->count()<1);
//                dd($info);
                if($info->count()<1)
                {


                    $weather=$postition->weather($city);
                    $fuck=collect($weather);
//                    dd($fuck["date"]);
                $date=$fuck["date"];
                $city=$fuck["city"];
                $quality=$fuck["data"]["quality"];
                $wendu=$fuck["data"]["wendu"];
                 $info= Weather::create(compact('date','city','quality','wendu'));

                }


//                dd($weather["date"]);
//                $date=$weather["date"];
////                dd($date);
//                $city=$weather["city"];
//                $quality=$weather["data"]["quality"];
//                $wendu=$weather["data"]["wendu"];
//                $info=new Weather($weather["date"],$weather["city"],$weather["data"]["quality"],$weather["data"]["wendu"]);
//                $info=new Weather($date,$city,$quality,$wendu);
//                dd($info->getCity());


//                $arr=$weather->city;
                $view->with('weather',$info);

                if(\Auth::check()){

                    $touPicture=\Auth::user()->touPicture;
                    $view->with('touPicture',$touPicture);
                }



            });
//            dd(123);



        Gate::define('userInfo',function($my,$user){

            return $my->id == $user->id;
        });


        Gate::define('post',function(Adminuser $admin){
            dd($admin);
//            return 1==1;
        });


        Gate::define('update-post', function ($user, $post) {
            return $user->id == $post->user_id;
        });

        Gate::define('delete-post',function($user,$post){
//            dd(123);
//            dd($user);
            return $user->id == $post->user_id;
        });

        $Authoritys=Admin_Authority::all();

        foreach($Authoritys as $item){

            Gate::define($item->name,function(Adminuser $user) use ($item){


                return $user->hasAuthority($item);

            });


        }


    }
}
