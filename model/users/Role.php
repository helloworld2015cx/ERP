<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: /2016/7/9/
 * Time: 22:56
 */

namespace Model\Users;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'admin_role';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function roleUser(){
        return $this->belongsTo('Model\\Users\\RoleUser' , 'role_id' , 'id');
    }

    public function hasManyRoleMenus(){
        return $this->hasMany('Model\\Users\\RoleMenu' , 'role_id' , 'id');
    }

}