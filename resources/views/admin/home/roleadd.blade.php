@extends('admin.layout.main')

@section('content')

    <h3>权限管理</h3>

    <hr>
    <ul class="list-group">

        <li class="list-group-item" style="margin-bottom: 10px">权限名
            <div class="pull-right" >
                {{$role->name}}

            </div>
        </li>
        <form action="/admin/role/update/{{$role->id}}" method="POST">
            {{csrf_field()}}
            <li class="list-group-item" style="margin-bottom: 10px">权限
                <div class="pull-right" >
                    <div class="btn-group" style="color: black" data-toggle="buttons">

                        <ul class="list-group">
                            @foreach($authiorys as $item)
                                <li class="list-group-item"><input type="checkbox"
                                                                   @if($myauthiory->contains($item))
                                                                   checked
                                                                   @endif
                                                                   value="{{$item->id}}" class="roleck" name="authiorty[]"> <a href="#" class="ckname">{{$item->miao}}</a></li>
                            @endforeach
                        </ul>

                    </div>
                    <input type="submit" class="btn btn-info roleck" value="修改权限">
                </div>
            </li>
        </form>

    </ul>

@endsection