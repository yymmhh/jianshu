@extends('admin.layout.main')

@section('content')

    <h3>写通知</h3>

    <hr>
    <ul class="list-group">
        <form action="/admin/notice/add" method="POST">
            {{csrf_field()}}
            <li class="list-group-item" style="margin-bottom: 10px">标题

                    <input type="text" name="title"/>


            </li>



            <li class="list-group-item" style="margin-bottom: 10px">内容

                <input type="text"  name="content"  style="width:  100%"  height="20%">



            </li>




            <li class="list-group-item" style="margin-bottom: 10px">

                <input type="submit" class="btn btn-info roleck" value="发布">




            </li>
        </form>

    </ul

@endsection