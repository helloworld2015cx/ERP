<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 17:28
 */

namespace Model\Users;

use Illuminate\Database\Eloquent\Model;
use Model\Users\RoleUser;
use Model\Users\RoleMenu;



class User extends Model
{

    protected $table = 'admin_user';
    public $timestamps = false;

    public function roleUser(){
        return $this->hasMany('Model\\Users\\RoleUser' , 'user_id' , 'id');
    }

    public static function getUserIdentity($userid){
        $re = static::where('id' , $userid)->first();
        $current_user = [
            'username' => $re->username,
            'user_id'  => $re->id,
            'nickname' => $re->nickname,
        ];
        $roleUsers = $re->roleUser()->with('role')->get();

        $roles = [];
        $roleIds = [];
        foreach($roleUsers as $key=>$role){
            $roles[$key]['role_id'] = $role->role->id;
            $roleIds[] = $role->role->id;
            $roles[$key]['role_name'] = $role->role->role_name;
            $roles[$key]['display_name'] = $role->role->display_name;
        }
        $menus = self::getMenusByRoleIds($roleIds);

        $current_user['role'] = $roles;
        $current_user['menus'] = $menus;
        return $current_user;
    }


    public static function getMenusByRoleIds($id){
        if(is_array($id)) {
            $raw_menus = RoleMenu::select('menu_id')->whereIn('role_id', $id)->with('hasOneMenu')->get()->toArray();
        }else{
            $raw_menus = RoleMenu::select('menu_id')->where('role_id', $id)->with('hasOneMenu')->get()->toArray();
        }

        $menus = [];
        $mark = [];
        $i=0;

        foreach($raw_menus as $k=>$v){
            if(in_array($v['menu_id'] , $mark)) continue;
            $mark[] = $v['menu_id'];
            $menus[$i]['menu_id'] = $v['menu_id'];
            $menus[$i]['pid'] = $v['has_one_menu']['pid'];
            $menus[$i]['menu_name'] = $v['has_one_menu']['menu_name'];
            $menus[$i]['display_name'] = $v['has_one_menu']['display_name'];
            $menus[$i]['uri'] = $v['has_one_menu']['uri'];
            $menus[$i]['order'] = $v['has_one_menu']['order'];
            $i++;
        }
        return $menus;
    }


}