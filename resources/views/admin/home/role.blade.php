@extends('admin.layout.main')


@section('content')

    @include('index.layout.session')
    <h3>角色管理</h3>
    <a class="btn btn-info" href="/admin/role/add/show">添加角色</a>
    <hr>
    <ul class="list-group">
        @foreach($role as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->name}}
                <div class="pull-right" >

                    <a href="/admin/role/show/{{$item->id}}" class="btn btn-success">权限设置</a>
                    <a href="/admin/role/show/{{$item->id}}/delete" class="btn btn-danger">删除</a>



                </div>
            </li>
        @endforeach

    </ul>


@endsection