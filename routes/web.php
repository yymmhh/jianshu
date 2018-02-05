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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/post','PostController');


Route::resource('/login','UserController');

Route::get('/logout',function(){
    \Auth::logout();
    return redirect('login');
});


Route::get('user/{user}/update','\App\Http\Controllers\UserController@updateUser');
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


Route::get('user/{user}','\App\Http\Controllers\FanController@index');
Route::get('user/{user}/fan','\App\Http\Controllers\FanController@fan');
Route::get('user/{user}/ufan','\App\Http\Controllers\FanController@ufan');
Route::get('topic/{topic}','\App\Http\Controllers\TopicController@index');
Route::post('topic/{topic}/tou','\App\Http\Controllers\TopicController@tou');


Route::get('notice/','\App\Http\Controllers\NoticeController@index');

include_once('admin.php');
