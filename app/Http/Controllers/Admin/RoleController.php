<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 11:36
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Model\Users\Role;


class RoleController extends Controller
{

    /**
     * Judge if user has target priority to operate following operations .
     */
    protected function __init__()
    {
        if (!can('role_management') ) {
            $this->middleware('access_denied');
        }
    }


    public function index(Request $request)
    {
        $page_size = 10;
        $keyword = $request->get('keyword');

        $roles = Role::select(['id' , 'role_name' , 'display_name' , 'create_at' , 'update_at' , 'describe'])
            ->with('hasManyRoleMenus.hasOneMenu')
            ->paginate($page_size);

        $raw_data = $roles->toArray();

        return view('admin.role.index' ,
            [
                'data'  =>  $roles ,
                'keyword'=>  $keyword
            ]);
    }

}