@extends('admin.layout.main')

@section('content')

    <h3>用户管理</h3>

    <hr>
    <ul class="list-group">

            <li class="list-group-item" style="margin-bottom: 10px">用户名
                <div class="pull-right" >
                   {{$admin_user->name}}

                </div>
            </li>
        <form action="/admin/user/{{$admin_user->id}}/addrole" method="POST">
            {{csrf_field()}}
        <li class="list-group-item" style="margin-bottom: 10px">角色
            <div class="pull-right" >
                <div class="btn-group" style="color: black" data-toggle="buttons">

                        <ul class="list-group">
                           @foreach($role as $item)
                            <li class="list-group-item"><input type="checkbox"
                                                               @if($myrole->contains($item))
                                                                       checked
                                                                       @endif
                                                               value="{{$item->id}}" class="roleck" name="roleck[]"> <a href="#" class="ckname">{{$item->name}}</a></li>
                            @endforeach
                        </ul>

            </div>
                <input type="submit" class="btn btn-info roleck" value="修改角色">
            </div>
        </li>
</form>

    </ul>

@endsection