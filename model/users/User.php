<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 17:28
 */

namespace Model\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'admin_user';
    public $timestamps = false;

}