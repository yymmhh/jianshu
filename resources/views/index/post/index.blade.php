@extends('index.layout.main')



@section('content')
    @include('index.layout.lun')
@include('index.layout.error')

@include('index.layout.session')


    <ul class="list-group " >
        @foreach($post as $item)
            <li class="list-group-item" style="border: 0px"><h3><a  href="/post/{{$item->id}}">{{$item->title}}</a></h3>
                <span><a href="/user/{{$item->user->id}}">{{$item->user->name}}</a> </span><span>{{$item->created_at->diffForHumans()}}</span>
                <p style="padding-top: 20px">{!! str_limit($item->content,100,'...') !!}</p>
                <span>赞</span><span>{{$item->zan_count}}</span>
                <span>评论</span><span>{{$item->comment_count}}</span>

            </li>

        @endforeach



    </ul>

    <ul class="pagination">
        {{$post->links()}}
    </ul>


@endsection

@section('foot')


@endsection


