@extends('admin.layout.main')

@section('content')

    <h3>权限管理</h3>
    {{--<a class="btn btn-info" href="#">添加权限</a>--}}
    <hr>
    <ul class="list-group">
       @foreach($author as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->name}}
                <span style="padding-left: 50px">{{$item->miao}}</span>
                <div class="pull-right" >
                    <input type="button" style="margin-top:-5px"  value="删除" class="btn btn-success">

                </div>
            </li>
        @endforeach

    </ul>

    @endsection