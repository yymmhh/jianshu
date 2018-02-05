@extends('admin.layout.main')

@section('content')

    <h3>用户管理</h3>
    <hr>
    <ul class="list-group">
        @foreach($user as $item)
            <li class="list-group-item" style="margin-bottom: 10px">{{$item->name}}
                <div class="pull-right" >
                    <a  href="/admin/user/{{$item->id}}" class="btn btn-success">操作</a>

                </div>
            </li>
        @endforeach

    </ul>

@endsection