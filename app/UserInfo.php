<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table='user_info';

    protected  $fillable=['autograph','job','user_id'];

}
