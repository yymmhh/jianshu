@extends('admin.layout.main')

@section('content')

    <h3>专题</h3>
    <hr>
    <ul class="list-group">
        @foreach($topic as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->name}}
                <div class="pull-right" >
                    <a  href="/admin/topic/{{$item->id}}" class="btn btn-success">操作</a>

                </div>
            </li>
        @endforeach

    </ul>

@endsection