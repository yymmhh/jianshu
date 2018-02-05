@extends('index.layout.main')

@section('content')
@include('index.layout.error')

    <img
            style="border-radius:50%;width: 100px;height: 100px;overflow:hidden;"

            @if($touPicture==null)
            src="{{URL::asset('storage/tou/1.jpg')}}"

            @else
            src="{{URL::asset('storage/tou/'. $touPicture)}}"
            @endif

            class="user-image" alt="User Image">
        <h2>{{$user->name}}

            @if(\Auth::check()  && \Auth::id()!=$user->id)

            @if(\Auth::user()->hasfan($user)->exists())
            <span class="lead fan"><input type="button"
                                          user="{{$user->id}}" don="ufan"
                                          class="btn fan" value="取消关注"></span>
            @else
                <span class="lead"><input type="button"
                                          user="{{$user->id}}" don="fan"
                                          class="btn fan" value="关注"></span>


            @endif



                @else
                <a class="btn btn-success" href="/user/{{$user->id}}/update">修改资料</a>
                @endif

            <br>
            <span style="color:gray;font-size: 15px;">{{$userInfo->autograph}}</span>
            <span class="label label-primary">{{$userInfo->job}}</span>
        </h2>



        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">
                    文章</a></li>
            <li><a href="#ios" data-toggle="tab">粉丝</a></li>
            <li><a href="#fen" data-toggle="tab">关注</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <p> <ul class="list-group " >
                        @foreach($post as $item)
                            <li class="list-group-item" style="border: 0px"><h3><a  href="/post/{{$item->id}}">{{$item->title}}</a></h3>
                                <span><a href="/user/{{$item->user->id}}">{{$item->user->name}}</a> </span><span>{{$item->created_at}}</span>
                <p style="padding-top: 20px">{!! str_limit($item->content,100,'...') !!}</p>
                <span>赞</span><span>{{$item->zan_count}}</span>
                <span>评论</span><span>{{$item->comment_count}}</span>

                </li>

                @endforeach</p>
            </div>
            <div class="tab-pane fade" id="ios">
                <p><ul class="list-group">
                    @foreach($fanuser as $item)
                    <a href="/user/{{$item->id}}" class="list-group-item">{{$item->name}}</a>

                        @endforeach
                </ul></p>
            </div>
            <div class="tab-pane fade" id="fen">
                <p><ul class="list-group">
                    @foreach($staruser as $item)
                        <a href="/user/{{$item->id}}" class="list-group-item">{{$item->name}}</a>

                    @endforeach
                </ul></p>
            </div>

        </div>
        <script>
            $(function(){
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    // 获取已激活的标签页的名称
                    var activeTab = $(e.target).text();
                    // 获取前一个激活的标签页的名称
                    var previousTab = $(e.relatedTarget).text();
                    $(".active-tab span").html(activeTab);
                    $(".previous-tab span").html(previousTab);
                });
            });
        </script>

    @endsection