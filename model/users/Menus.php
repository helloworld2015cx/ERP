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
}