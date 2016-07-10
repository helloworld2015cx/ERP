<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: /2016/7/9/
 * Time: 23:06
 */

namespace Model\Users;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{

    protected $table = 'admin_user_role';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('Model\\Users\\User' , 'id' , 'user_id');
    }

    public function role(){
        return $this->hasOne('Model\\Users\\Role' , 'id' , 'role_id');
    }

}