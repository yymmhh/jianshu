/**
 * Created by Administrator on 2018/1/17.
 */
$(function(){

    $(".zan").click(function(){
        var don=$(".zan").attr("don");
        var postid=$(this).attr("post");
        //alert(don);
        //return;


        if(don=="zan")
        {
            var postid=$(this).attr("post");
            //alert(postid);


            $.ajax({
                type: 'GET',
                url: '/post/'+postid+'/zan',
                //data: data,

                dataType: "json",
                success: function(result){

                    //alert(result.error);
                    if(result.error==0)
                    {
                        $(".uzan span").css("color","orange");
                        $(".zhi").html("取消赞");
                        $(".zan").attr("don","uzan");
                    }
                }
            });
        }else if(don=="uzan"){
            $.ajax({
                type: 'GET',
                url: '/post/'+postid+'/uzan',
                //data: data,

                dataType: "json",
                success: function(result){

                    //alert(result.error);
                    if(result.error==0)
                    {
                        $(".uzan span").css("color","orange");
                        $(".zhi").html("赞");
                        $(".zan").attr("don","zan");
                    }
                }
            });
        }


    })


    $(".nzan").click(function(){

        alert("请先登陆!");

        self.location='/login';

    });


    $(".fan").click(function(){

        var don=$(this).attr('don');
        var userid=$(this).attr('user');

        if(don=="fan"){
            $.ajax({
                type: 'GET',
                url: '/user/'+userid+'/fan',
                dataType: "json",
                success: function(result){

                    //alert(result.error);
                    if(result.error==0)
                    {

                        $(".fan").val("取消关注");
                        $(".fan").attr("don","ufan");
                    }
                }
            });
        }else{
            $.ajax({
                type: 'GET',
                url: '/user/'+userid+'/ufan',
                dataType: "json",
                success: function(result){

                    //alert(result.error);
                    if(result.error==0)
                    {

                        $(".fan").val("关注");
                        $(".fan").attr("don","fan");
                    }
                }
            });
        }


    })




    //文章的通过的和拒绝

    $(".postyes").click(function(){
        var postid=$(this).attr("post");




        $.ajax({
            method:"GET",
            url:"/admin/post/"+postid+"/yes",
            dataType:"json",
            success:function(result){
                if(result.error!=0){
                    return;
                }

            }




        });
        $(this).parent().parent().remove();



    });



    //拒绝

    $(".postno").click(function(){
        var postid=$(this).attr("post");




        $.ajax({
            method:"GET",
            url:"/admin/post/"+postid+"/no",
            dataType:"json",
            success:function(result){
                if(result.error!=0){
                    return;
                }

            }




        });
        $(this).parent().parent().remove();



    });


})