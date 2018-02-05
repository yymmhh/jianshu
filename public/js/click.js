/**
 * Created by Administrator on 2018/1/19.
 */
$(function(){

    //单机系统管理淡入子子节点
    $(".xiao").click(function(){


        $(".xiaolie").fadeToggle();
    })



    $(".xiaolie a").click(function(){

        $(".xiaolie").fadeIn();
        $(".xiaolie").addClass("active").siblings("a").removeClass("active");

    });

//左边的任务栏,单击有颜色
    $(".left a").click(function(){

        $(this).addClass("active").siblings("a").removeClass("active");

    })


    $(".ckname").click(function(){

        //$(this).css("background-color","blue");
        $(this).siblings("input").attr('checked', true);
    })
})