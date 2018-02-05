@extends('admin.layout.main')

@section('content')

    <h3>添加角色</h3>

    <hr>
    <ul class="list-group">
        <form action="/admin/role/add/show" method="POST">
            {{csrf_field()}}
        <li class="list-group-item" style="margin-bottom: 10px">角色名
            <div class="pull-right" >
               <input type="text" name="name"/>

            </div>
        </li>



            <li class="list-group-item" style="margin-bottom: 10px">权限
                <div class="pull-right" >
                    <div class="btn-group" style="color: black" data-toggle="buttons">

                        <ul class="list-group">
                            @foreach($authiorys as $item)
                                <li class="list-group-item"><input type="checkbox"

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