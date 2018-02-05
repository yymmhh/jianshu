@extends('index.layout.main')


@section('content')
    @include('index.layout.error')
    @include('index.layout.session')
    <form class="form-horizontal" role="form" action="/login/update" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text"
                       value="{{old('name')}}"
                       name="name" required class="form-control" id="firstname" placeholder="请输入用户名">
            </div>
        </div>

        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="text"
                       value="{{old('email')}}"
                       name="email" required class="form-control" id="firstname" placeholder="请输入邮箱">
            </div>
        </div>

        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">密&nbsp&nbsp&nbsp&nbsp&nbsp码</label>
            <div class="col-sm-10">
                <input type="password"
                       value="{{old('password')}}"
                       name="password" required class="form-control" id="lastname" placeholder="请输入密码">
            </div>
        </div>


        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
                <input type="password"
                       value="{{old('password2')}}"
                       name="password2" required class="form-control" id="lastname2" placeholder="请输入密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">记住我
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">注册</button>
            </div>
        </div>
    </form>



@endsection