<?php

namespace App\Api;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/2
 * Time: 13:06
 */
class Position
{

////获得本地真实IP
    function get_onlineip() {
        $ip_json = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=myip");
        $ip_arr=json_decode(stripslashes($ip_json),1);
        if($ip_arr['code']==0)
        {
            return $ip_arr['data']['ip'];
        }

    }

////根据ip获得访客所在地地名
    function Get_Ip_From($ip=''){
        if(empty($ip)){
            $ip = self::get_onlineip();
        }
        $ip_json=@file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=".$ip);//根据taobao ip
        $ip_arr=json_decode(stripslashes($ip_json),1);
        if($ip_arr['code']==0)
        {
            return $ip_arr;
        }
        else
        {
            return false;
        }

    }


    ////获取访客操作系统
    function Get_Os(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
            $OS = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/win/i',$OS)) {
                $OS = 'Windows';
            }
            elseif (preg_match('/mac/i',$OS)) {
                $OS = 'MAC';
            }
            elseif (preg_match('/linux/i',$OS)) {
                $OS = 'Linux';
            }
            elseif (preg_match('/unix/i',$OS)) {
                $OS = 'Unix';
            }
            elseif (preg_match('/bsd/i',$OS)) {
                $OS = 'BSD';
            }
            else {
                $OS = 'Other';
            }
            return $OS;
        }
        else{
            return "unknow";
        }
    }

    //天气
    public function  weather($Position){


         $weather =file_get_contents("http://www.sojson.com/open/api/weather/json.shtml?city=$Position");
//        dd($weather);
        return $ip_arr=json_decode($weather,true);
//        return $weather;
    }
}