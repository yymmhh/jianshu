
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <link rel="icon" href="{{URL::asset('img/timg.jpg')}}" type="image/x-icon"/>

    <title>拉瓦博客</title>


    <!-- Bootstrap core CSS -->

    <link href="{{URL::asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/wangEditor.min.css')}}" rel="stylesheet">


    <style>
        #weather1 li a{
            color: white;
        }


    </style>
    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/blog.css')}}" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>-->

    <![endif]-->
</head>

<body>

<!--头部!-->

<nav class="navbar navbar-default"  style="background-color: #0f0f0f" role="navigation">
    <div class="container-fluid">
        <div style="margin-left: 300px">
            <div class="navbar-header ">
                <a class="navbar-brand" href="/post">YMH</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/post/create">发帖子</a></li>

            </ul>

            {{--<ul class="nav navbar-nav">--}}
                {{--<li><a href="#">{{\Auth::id()}}</a></li>--}}

            {{--</ul>--}}

            @include('index.layout.topic')


            <form class="navbar-form navbar-left " role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索文章">
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form></div>

        {{--<ul class="nav navbar-nav">--}}
            {{--<li></li>--}}

        {{--</ul>--}}
        @yield('weather')


        <ul class="nav navbar-nav navbar-right">
            @if(\Auth::id()!=null)

                <div class="btn-group">

                    <button type="button" style="background-color: #0f0f0f;border: 0px;color: white" class="btn btn-default dropdown-toggle btn-lg"
                            data-toggle="dropdown">
                        <img
                                style="border-radius:50%;width: 30px;height: 32px;overflow:hidden;"

                                src="{{URL::asset('storage/tou/'. $touPicture)}}" class="user-image" alt="User Image">
                        {{\Auth::user()->name}} <span class="caret"></span>
                    </button>

                    {{--<ul><img style="border-radius:50%"--}}
                             {{--src="{{URL::asset("img/1.jpg")}}"></ul>--}}


                    <ul class="dropdown-menu"
                        style="margin-right: 100px;"
                        role="menu">
                        <li><a href="/user/{{\Auth::id()}}">个人中心</a></li>
                        <li><a href="/logout">登出</a></li>


                    </ul>
                </div>

                {{--<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>--}}
            @else

                <li><a href="/login/create"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                @endif

        </ul>
    </div>
</nav>

<!--右边!-->








<div class="row center-block" style="width: 619px">

                @yield('content')




            </div>


@yield('foot')





</body>
<script src="{{URL::asset('/js1/jquery-2.1.1.min.js')}}"></script>
{{--<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>--}}

<script src="{{URL::asset('/js1/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js1/wangEditor.min.js')}}"></script>

<script src="{{URL::asset('/js/ajax.js')}}"></script>

@yield('wl_js')
</html>
