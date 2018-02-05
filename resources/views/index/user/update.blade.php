@extends('index.layout.main')

@section('content')

    @include('index.layout.session')


    <script>

        $(function(){
            $("#changePi,#pic1").click(function(){






                $("#file").click();


            });

            $("#file").change(function(){
                var file = $('#file').get(0).files[0];

                //创建用来读取此文件的对象
                var reader = new FileReader();
                //使用该对象读取file文件
                reader.readAsDataURL(file);
                //读取文件成功后执行的方法函数
                reader.onload=function(e){
                    //读取成功后返回的一个参数e，整个的一个进度事件
                    console.log(e);
                    //选择所要显示图片的img，要赋值给img的src就是e中target下result里面
                    //的base64编码格式的地址
                    $('#touPicture').get(0).src = e.target.result;
                }
            })



            $("input[type=submit]").click(function(){
                var fileLength = 0;
                $(":file").each(function(){
                    var val = $.trim($(this).val());
                    if(val.length > 6)
                        fileLength += 1;
                });

                if(fileLength == 0){
//file域没有选择文件处理

//                    return false;
                }

//清空input的值
                var form = document.forms[index]; //index 是文件域的form索引
                form.reset();
            })



        })

    </script>


    <form id="pic" action="/user/1/store" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
    <a href="javascript:void(0)" id="pic1">
    <img id="touPicture"


            style="border-radius:50%;width: 100px;height: 100px;overflow:hidden;"


            src="{{URL::asset('storage/tou/'. $touPicture)}}" class="user-image" alt="User Image">

    </a>

    <input type="button" id="changePi" value="更改头像" class="btn btn-info"/>



    <h2>梁雨欣




    </h2>

        <input type='file'  accept='image/*' name='file'  id='file' style='display: none'/>


        <ul class="list-group">
            <li class="list-group-item">个性签名<input name="autograph" type="text" value="{{$info->autograph}}"></li>
            <li class="list-group-item">语&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp言

                <?php $var=["PHP","JAVA","C","C++","菜鸟一枚"] ?>
                <select name="job">
                    @foreach($var as $item)
                    <option value="{{$item}}" name="job"
                    @if($info->job==$item)
                    selected
                        @endif
                    >{{$item}}</option>
                    @endforeach
                    {{--<option value="JAVA">JAVA</option>--}}
                    {{--<option value="C">C</option>--}}
                    {{--<option value="C++">C++</option>--}}
                </select></li>

        </ul>



        <input type="submit" class="btn btn-success" value="提交修改">
    </form>







@endsection