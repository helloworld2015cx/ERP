<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: /2016/7/10/
 * Time: 15:48
 */

namespace Model\Users;
use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    protected $table = 'admin_role_menu';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function hasOneMenu(){
        return $this->hasOne('Model\\Users\\Menus' , 'id' , 'menu_id');
    }

    public function hasOneRole(){
        return $this->hasOne('Model\\Users\\Role' , 'id' , 'role_id');
    }

}