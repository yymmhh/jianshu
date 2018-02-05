@extends('admin.layout.main')

@section('content')

    <h3>最新投稿</h3>
    <hr>
    <ul class="list-group">

        {{dd($arr->$item)}}
        @foreach($arr->$item->$item as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->title}}
                <div class="pull-right">
                    <a  href="/admin/user/{{$item->id}}" class="btn btn-success">通过</a>
                    <a  href="/admin/user/{{$item->id}}" class="btn btn-danger">移除</a>

                </div>
            </li>
        @endforeach

    </ul>

@endsection