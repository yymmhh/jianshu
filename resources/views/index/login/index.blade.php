@extends('index.layout.main')


@section('content')

    @include('index.layout.error')
    @include('index.layout.session')
    <form class="form-horizontal" role="form" action="/login" method="POST">
            {{csrf_field()}}

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text"
    name="email"
                       class="form-control" id="firstname" placeholder="请输入邮箱">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">密&nbsp&nbsp&nbsp&nbsp&nbsp码</label>
            <div class="col-sm-10">
                <input type="password"
                       name="password"
                       class="form-control" id="lastname" placeholder="请输入密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">请记住我
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">登录</button>
            </div>
        </div>
    </form>



    @endsection