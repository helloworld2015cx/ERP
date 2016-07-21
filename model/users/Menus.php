<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: /2016/7/10/
 * Time: 15:45
 */

namespace Model\Users;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'admin_menus';
    public $timestamps = false;

    protected $guarded = ['id'];

    public function roleMenu(){
        return $this->belongsTo('Model\\Users\\RoleMenu' , 'menu_id' , 'id');
    }

    public function hasOneParent(){
        return $this->hasOne('Model\\Users\\Menus' , 'id' , 'pid');
    }

    public function hasOneCreator(){
        return $this->hasOne('Model\\Users\\User' , 'id' , 'creator');
    }

    public function hasManySubMenus(){
        return $this->hasMany('Model\\Users\\Menus' , 'pid' , 'id');
    }

    public function hasRoles(){
        return $this->hasMany('Model\\Users\\RoleMenu' , 'menu_id' , 'id');
    }



}