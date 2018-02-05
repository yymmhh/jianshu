@extends('admin.layout.main')

@section('content')

    <h3>{{$topic->name}}</h3>
    <hr>
    <ul class="list-group">
        @foreach($post as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->title}}
                <div class="pull-right">
                    <a  href="/admin/topic/{{$item->id}}/{{$topic->id}}/no" class="btn btn-danger">移除</a>

                </div>
            </li>
        @endforeach

    </ul>


    <h3>最新投稿</h3>
    <hr>
    <ul class="list-group">
        @foreach($newPosts as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->title}}
                <div class="pull-right">
                    <a  href="/admin/topic/{{$item->id}}/{{$topic->id}}/ok" class="btn btn-success">通过</a>
                    <a  href="/admin/topic/{{$item->id}}/{{$topic->id}}/no" class="btn btn-danger">拒绝</a>


                </div>
            </li>
        @endforeach

    </ul>

@endsection