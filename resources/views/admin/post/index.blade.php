
@extends('admin.layout.main')

@section('content')
<h3>文章审核</h3>
<hr>
<ul class="list-group">
   @foreach($post as $item)
        <li class="list-group-item" style="margin-bottom: 10px">{{$item->title}}

            <div class="pull-right">
                <button type="button" post="{{$item->id}}" class="btn btn-success postyes">通过</button>
                <button type="button" post="{{$item->id}}" class="btn btn-danger postno">拒绝</button>
            </div>
        </li>
    @endforeach

</ul>

    @endsection