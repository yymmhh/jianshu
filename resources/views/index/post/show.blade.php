@extends('index.layout.main')



@section('content')

    <ul class="list-group " >

{{--        {{dd(\Auth::user())}}--}}
            <li class="list-group-item" style="border: 0px"><h3><a  style="color: #3c3c3c" href="/post/{{$post->id}}">{{$post->title}}</a></h3>
            @can('update-post',$post->user_id)
                <a class="label label-info" href="/post/{{$post->id}}/edit">修改</a>
                @endcan

                @can('delete-post',$post->user_id)
                <a class="label label-danger delete" id="delete1" href="/post/{{$post->id}}/delete">删除</a>

                @endcan
                <br>
                <span style="font-size: 20px"><a href="/user/{{$post->user->id}}">{{$post->name}}</a> </span><span>{{$post->created_at}}</span>
                <p style="padding-top: 20px">{!! $post->content!!}</p>
                <br>

                @if(\Auth::check())
                @if(\Auth::user()->haszan($post)->exists())

                    <button type="button"
                            style="color: orange"
                            class="btn btn-default btn-lg zan"
                            post="{{$post->id}}"
                            don="uzan"
                    >
                        <span class="glyphicon glyphicon-thumbs-up "></span> <span class="zhi">取消赞</span>

                    </button>
                    @else
                    <button type="button" style="color: orange" class="btn btn-default btn-lg zan" post="{{$post->id}}" don="zan">
                        <span class="glyphicon glyphicon-thumbs-up"></span> <span class="zhi">赞</span>


                    </button>


                    @endif


                    @else
                    <button type="button" style="color: orange" class="btn btn-default btn-lg nzan" post="{{$post->id}}" don="zan">
                        <span class="glyphicon glyphicon-thumbs-up"></span> <span class="zhi">赞</span>


                    </button>
                    @endif


            </li>




    </ul>
<form action="/post/{{$post->id}}/comment" method="POST">
    {{csrf_field()}}

    <textarea class="form-control" required rows="3" name="content" ></textarea>
    <button type="submit" class="btn btn-default btn-lg btn-block">发射</button>
    </form>

    <br>
    <ul class="list-group ">


        @foreach($comment as $item)
                <li class="list-group-item">{{$item->content}}
                <strong style="color:cornflowerblue;float: right">{{$item->user->name}}</strong><span style="float: right">{{$item->created_at->diffForHumans()}}
            </span>


        </li>
        @endforeach


    </ul>




@endsection

@section('foot')


@endsection

@section('wl_js')
    <script>
        $("#delete1").click(function(){
            var msg = "您真的确定要删除吗？\n\n请确认！";
            if (confirm(msg)==true){
                return true;
            }else{
                return false;
            }

        });

    </script>
    @endsection
