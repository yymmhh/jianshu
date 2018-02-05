
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



    </style>
    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/blog.css')}}" rel="stylesheet">


</head>

<body>

<div class="container text-center">
    <div class="jumbotron center-block">
        <h1 >Laravel后台</h1>
        <form  class="form-horizontal" action="/admin/login/store" method="POST">
            {{csrf_field()}}
            <div class="form-group text-center" style="padding-left: 170px">
                <label class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                    <input style="width: 300px" name="name" class="form-control" id="focusedInput" type="text"/>
                </div>
            </div>
            <div class="form-group text-center" style="padding-left: 170px">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input style="width: 300px"  name="password" class="form-control" id="focusedInput" type="password"/>
                </div>
            </div>

            <div class="form-group text-center" style="padding-left: 165px">

                <div class="col-sm-10">
                    <input style="width: 300px" class="btn btn-info" id="focusedInput" type="submit" value="登陆"/>
                </div>
            </div>


        </form>
    </div>
</div>



<script src="{{URL::asset('/js1/jquery-2.1.1.min.js')}}"></script>
{{--<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>--}}

<script src="{{URL::asset('/js1/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js1/wangEditor.min.js')}}"></script>
<script src="{{URL::asset('/js/ajax.js')}}"></script>
</body>
</html>
