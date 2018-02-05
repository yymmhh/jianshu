@extends('index.layout.main')


@section('content')



    @include('index.layout.session')
    <h2>通知</h2>

    <ul class="list-group " >
        @foreach($notice as $item)

            <li class="list-group-item" style="border: 0px"><a style="font-size: 20px" href="/post/{{$item->id}}">{{$item->title}}</a><span style="padding-left: 100px">{{$item->created_at}}</span>

                <p style="padding-top: 20px">{!! str_limit($item->content,100,'...') !!}</p>


            </li>
            <hr>

        @endforeach



    </ul>

    <ul class="pagination">
        {{--{{$post->links()}}--}}
    </ul>




@endsection