<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userssaddress extends Model
{
    //模型关联的数据表
    protected $table = 'address';
    //主键
    protected $primaryKey='id';
    //是否开启自动维护时间戳
    public $timestamps = false;
}
