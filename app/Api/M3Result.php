<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/15
 * Time: 11:21
 */

namespace App\Api;


class M3Result
{

    public  $status;
    public  $msg;
    public  $arr=[];
    public function toJson()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }

}