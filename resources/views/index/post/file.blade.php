
@extends('index.layout.main')



@section('content')

    @include('index.layout.error')
    <form action="/jianshu/fabu/public/file" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}


        <input type="file"  name="file"  id="file" />


        <input type="submit" value="提交修改">
    </form>




@endsection

@section('foot')


@endsection


@section('wl_js')

@endsection
