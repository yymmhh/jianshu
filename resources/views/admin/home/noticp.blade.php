@extends('admin.layout.main')


@section('content')

    @include('index.layout.session')
    <h3>全部通知</h3>
    <a class="btn btn-info" href="/admin/notice/add">写通知</a>
    <hr>
    <ul class="list-group">
        @foreach($notice as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->title}}
                <div class="pull-right" >


                    <a href="/admin/role/show/{{$item->id}}/delete" class="btn btn-danger">删除</a>



                </div>
            </li>
        @endforeach

    </ul>


@endsection