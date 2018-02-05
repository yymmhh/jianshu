<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->


    <title>Admin</title>


    <!-- Bootstrap core CSS -->

    <link href="{{URL::asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/wangEditor.min.css')}}" rel="stylesheet">


    <style>

        .left,.content{
            float: left;
        }
        .content{
            padding-left:10px;
            margin-top: -20px
        }
        .blue1{
            background-color: blue;
            color: red;
            /*display: none;*/
        }



    </style>
    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/blog.css')}}" rel="stylesheet">


</head>

<body>



<nav class="navbar navbar-default" style="background-color: #1d7db1" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin/post/index" style="color: white">后台</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="color: white">
            @if(\Auth::guard("admin")->check())
                <li><a href="#" style="color: white"><span class="glyphicon glyphicon-user" ></span> {{\Auth::guard("admin")->user()->name}}</a></li>
                @else
                <li><a href="#" style="color: white"><span class="glyphicon glyphicon-user" ></span> 注册</a></li>
                <li><a href="#" style="color: white" > <span class="glyphicon glyphicon-log-in" style="color: white"></span> 登录</a></li>
                @endif
        </ul>
    </div>
</nav>

<div class="list-group left" style="width: 15%;margin-top: -20px">
    @can('post',\Auth::user())
    <a href="/admin/post/index" class="list-group-item active">
        <h4 class="list-group-item-heading">
            文章管理
        </h4>
    </a>
    @endcan


    @can('topic',\Auth::user())
    <a href="/admin/topic" class="list-group-item">
        <h4 class="list-group-item-heading">
            专题管理
        </h4>

    </a>
    @endcan

    @can('nitice',\Auth::user())
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">
            通知管理
        </h4>

    </a>
    @endcan


    @can('admin',\Auth::user())
    <a href="#" class="list-group-item  xiao">
        <h4 class="list-group-item-heading">
           系统管理
        </h4>


    </a>
    @endcan
    <ul class="list-group xiaolie" >
        <a href="/admin/user"><li class="list-group-item">用户管理</li></a>

        <a href="/admin/role"><li class="list-group-item">角色管理</li></a>
        <a href="/admin/authority"><li class="list-group-item">权限管理</li></a>

    </ul>


</div>

<section class="center-block content" style="width: 50%">

    @yield('content')

</section>








<script src="{{URL::asset('/js1/jquery-2.1.1.min.js')}}"></script>
{{--<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>--}}

<script src="{{URL::asset('/js1/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js1/wangEditor.min.js')}}"></script>
<script src="{{URL::asset('/js/ajax.js')}}"></script>
<script src="{{URL::asset('/js/click.js')}}"></script>
</body>
</html>