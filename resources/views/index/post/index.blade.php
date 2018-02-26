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


@section('weather')
    <ul class="nav navbar-nav weather1" id="weather1">
        <li><a class="ymh_city" href="javascript:void(0)"></a></li>
        <li><a class="ymh_6bu6" href="javascript:void(0)"></a></li>
        {{--<li><a href="javascript:void(0)">{{$weather[3]}}°</a></li>--}}
        <li><a class="ymh_wendu" href="javascript:void(0)"></a></li>


    </ul>
    @endsection


@section('wl_js')
    <script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script>
    <script>
    //网页加载完成之后加载天气接口
    var city = remote_ip_info['city'];
    //alert(city)

    $.ajax({
    type: 'GET',
    url: '/weather/'+city,
    //data: data,

    dataType: "json",
    success: function(result){

    //alert(result.arr.city);
    if(result.status==0)
    {

    $(".ymh_city").html(result.arr.city);
    $(".ymh_6bu6").html(result.arr.quality);
    $(".ymh_wendu").html(result.arr.wendu+"°");
    }
    }
    });

    </script>
    @endsection

