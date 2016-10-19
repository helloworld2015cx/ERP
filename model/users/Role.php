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

    /**
     * role 角色表 与 role_user 表单的绑定关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleUser()
    {
        return $this->belongsTo('Model\\Users\\RoleUser' , 'role_id' , 'id');
    }

    /**
     * role 角色表与role_menu 表的绑定关心
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasManyRoleMenus()
    {
        return $this->hasMany('Model\\Users\\RoleMenu' , 'role_id' , 'id');
    }

    /**
     * role 表 通过 role_user 表 获取该角色所具有的菜单
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
//    public function hasManyMenusThrough()
//    {
//        return $this->hasManyThrough('Model\\Users\\Menus', 'Model\\Users\\RoleMenu', 'menu_id' , 'id' , 'id');
//    }

//    public function hasManyUsersThrough()
//    {
//        return $this->hasManyThrough('Model\\Users\\RoleUser' , 'Model\\Users\\User' , '' , '' , '');
//    }

}