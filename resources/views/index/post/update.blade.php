
@extends('index.layout.main')



@section('content')


    <form action="/post/{{$post->id}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}

        <div class="center-block">
            <h3>标题</h3>
            <input class="form-control" type="text"
                   value="{{$post->title}}"
                   required name="title">

            <h3>内容</h3>
<textarea id="content" rows="25" name="content">

    {{$post->content}}
    </textarea>
        </div>
        <input type="submit" class="btn btn-lg" value="提交">
    </form>

    <script>

        var editor = new wangEditor('content');

        editor.create();

    </script>


@endsection

@section('foot')


@endsection
