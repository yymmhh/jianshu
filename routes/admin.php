<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/19
 * Time: 16:40
 */


//登陆
Route::get('admin/login/index','\App\Admin\Controllers\LoginController@index');
Route::post('admin/login/store','\App\Admin\Controllers\LoginController@store');








Route::get('admin/notice/index','\App\Admin\Controllers\HomeController@index');


Route::group(['middleware'=>'auth:admin'],function() {
    Route::get('admin/post/index', '\App\Admin\Controllers\PostController@index');


    Route::group(['middleware'=>'can:post'],function(){

        //文章通过
        Route::get('admin/post/{post}/yes','\App\Admin\Controllers\PostController@postyes');
//拉黑文章
        Route::get('admin/post/{post}/no','\App\Admin\Controllers\PostController@postno');
    });



    //专题
    Route::get('admin/topic','\App\Admin\Controllers\TopicController@index');
    Route::get('admin/topic/{topic}','\App\Admin\Controllers\TopicController@show');
    Route::get('admin/topic/{post}/{topic}/ok','\App\Admin\Controllers\TopicController@ok');
    Route::get('admin/topic/{post}/{topic}/no','\App\Admin\Controllers\TopicController@no');

    //用户
    Route::get('admin/user','\App\Admin\Controllers\AdminController@user');
    Route::get('admin/user/{admin_user}','\App\Admin\Controllers\AdminController@useradd');
//给用户添加角色
    Route::post('admin/user/{admin_user}/addrole','\App\Admin\Controllers\AdminController@addrole');
//注册
    Route::get('admin/user/add','\App\Admin\Controllers\AdminController@index');

    //权限
    Route::get('admin/authority','\App\Admin\Controllers\AuthorityController@authority');
    Route::get('admin/authority/add','\App\Admin\Controllers\AuthorityController@add');


//角色
    Route::get('admin/role','\App\Admin\Controllers\RoleController@index');
    //查看角色详情
    Route::get('admin/role/show/{role}','\App\Admin\Controllers\RoleController@role');
    //删除角色
    Route::get('admin/role/show/{role}/delete','\App\Admin\Controllers\RoleController@delete');

    //添加角色页面
    Route::get('admin/role/add/show','\App\Admin\Controllers\RoleController@roleAdd');
    //提交添加角色
    Route::post('admin/role/add/show','\App\Admin\Controllers\RoleController@roleStore');
    //提交角色的权限的修改
    Route::post('admin/role/update/{role}','\App\Admin\Controllers\RoleController@add');


//通知
    Route::get('admin/notice','\App\Admin\Controllers\NoticeController@index');

    Route::get('admin/notice/add','\App\Admin\Controllers\NoticeController@add');

    Route::post('admin/notice/add','\App\Admin\Controllers\NoticeController@store');


});

