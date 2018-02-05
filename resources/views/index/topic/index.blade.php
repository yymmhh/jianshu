@extends('index.layout.main')


@section('content')



    @include('index.layout.session')
    <h2>{{$topic->name}}</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        投稿
    </button>
    <ul class="list-group " >
        @foreach($post as $item)
            <li class="list-group-item" style="border: 0px"><h3><a  href="/post/{{$item->id}}">{{$item->title}}</a></h3>
                <span><a href="/user/{{$item->user->id}}">{{$item->user->name}}</a> </span><span>{{$item->created_at}}</span>
                <p style="padding-top: 20px">{!! str_limit($item->content,100,'...') !!}</p>
                <span>赞</span><span>{{$item->zan_count}}</span>
                <span>评论</span><span>{{$item->comment_count}}</span>

            </li>

        @endforeach



    </ul>

    <ul class="pagination">
        {{$post->links()}}
    </ul>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        我的文章
                    </h4>
                </div>
                <div class="modal-body">
                   <form action="/topic/{{$topic->id}}/tou" method="POST">
                       {{csrf_field()}}
                       @foreach($lastpost as $item)
                       <input type="checkbox" name="post[]" value="{{$item->id}}">{{$item->title}}<br>
                       @endforeach


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        投稿
                    </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>


    @endsection