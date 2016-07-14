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


    /**
     * 定义和角色用户表的关联模型
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleUser(){
        return $this->hasMany('Model\\Users\\RoleUser' , 'user_id' , 'id');
    }


    /**
     * 根据用户的ID,获取用户信息
     * @param $userid
     * @return array
     */
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
        $current_user['menus'] = self::formatMenus($menus);
        return $current_user;
    }


    /**
     * 根据单一或者数组格式的角色ID来获取角色对应的菜单
     * @param $id
     * @return array
     */
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
            $menus[$i]['menu_icon'] = $v['has_one_menu']['menu_icon'];
            $menus[$i]['order'] = $v['has_one_menu']['order'];
            $i++;
        }
        return $menus;
    }


    /**
     * 将菜单的格式组织成 可以循环展示出的嵌套格式
     * @param $menus
     * @return array
     */
    public static function formatMenus($menus){

        $p_menus = [];
        $sub_menus = [];
        $numP = 0;
        foreach($menus as $key=>$value){
            if($value['pid']==0){
                $p_menus[$numP] = $value;
                $p_menus[$numP]['sub_menus'] = false;
                $numP++;
            }else{
                $sub_menus[] = $value;
            }
        }

        foreach($sub_menus as $k=>$v){
            foreach($p_menus as $p_k=>$p_v){
                if($p_v['menu_id'] == $v['pid']){
                    $p_menus[$p_k]['sub_menus'][] = $v;
                    break;
                }
            }
        }
        return self::orderMenus($p_menus);
    }


    /**
     * 将菜单按照 order 字段进行递归排序
     * @param $p_menus
     * @return mixed
     */
    public static function orderMenus($p_menus){
        $order = array_column($p_menus , 'order');
        array_multisort($order , SORT_ASC , SORT_NUMERIC, $p_menus);

        foreach($p_menus as $key=>$sub_menus){
            if(isset($sub_menus['sub_menus']) && $sub_menus['sub_menus']){
                $p_menus[$key]['sub_menus'] = self::orderMenus($sub_menus['sub_menus']);
            }
        }

        return $p_menus;
    }




}