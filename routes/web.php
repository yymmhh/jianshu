<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::any('/file','PostController@file');
Route::post('/file','PostController@filego');





//获取天气的json

Route::get('/weather/{position}','PostController@wealther');




//设置首页就是文章列表页面
Route::get('/','PostController@index');


//文章相关





Route::resource('/post','PostController');





//登陆注册相关
Route::resource('/login','UserController');

//登出
Route::get('/logout',function(){
    \Auth::logout();
    return redirect('login');
});


//个人资料修改
Route::get('user/{user}/update','\App\Http\Controllers\UserController@updateUser');
//修改行为
Route::post('user/{user}/store','\App\Http\Controllers\UserController@updateStore');

//文章的删除
Route::get('/post/{post}/delete','\App\Http\Controllers\PostController@destroy')
    ->middleware('can:delete-post,post');


Route::group(['middleware' => ['Lend']], function () {
    //评论
    Route::post('/post/{post}/comment','\App\Http\Controllers\UserController@comment');


    //赞
    Route::get('post/{post}/zan','\App\Http\Controllers\UserController@zan');
    //取消赞
    Route::get('post/{post}/uzan','\App\Http\Controllers\UserController@uzan');

});


Route::get('user/{user}.袁明航','\App\Http\Controllers\FanController@index');
Route::get('user/{user}/fan','\App\Http\Controllers\FanController@fan');
Route::get('user/{user}/ufan','\App\Http\Controllers\FanController@ufan');
Route::get('topic/{topic}','\App\Http\Controllers\TopicController@index');
Route::post('topic/{topic}/tou','\App\Http\Controllers\TopicController@tou');


Route::get('notice/','\App\Http\Controllers\NoticeController@index');

include_once('admin.php');
