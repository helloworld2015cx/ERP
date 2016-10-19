<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Model\Users\Menus;
use Illuminate\Support\Facades\Cache;
//use Illuminate\Support\Facades\DB;

class MenuManageController extends Controller
{



    public function __init__()
    {
        if (! can('menu_manage')) {
            $this->middleware('access_denied');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('s_title');
//        dump($keyword);
        $menus = Menus::select(['id','pid','menu_name','order','display_name','uri','creator','create_at','update_at'])
            ->where('display_name' , 'like' , "%{$keyword}%")
            ->with('hasOneCreator')
            ->with('hasOneParent')
            ->paginate(DEFAULT_PAGE_SIZE);


        return view('admin.menu.index' , ['menus' => $menus , 'keyword'=>$keyword]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Pmenus = Menus::select(['id','display_name'])
            ->where('pid',0)->get()
            ->toArray();

        return view('admin.menu.create')->with('Pmenus',$Pmenus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dump($request->all());
        $menu_data = null;
        if($request->menu_type==1){
            $menu_data = [
                'display_name'  =>  e($request->display_name),
                'menu_name'     =>  e(str_replace(' ','_',$request->menu_name)),
                'order'         =>  e(intval($request->order)),
                'desc'          =>  e($request->desc),
                'menu_icon'     =>  e($request->menu_icon),
                'creator'       =>  session('user_id'),
                'create_at'     =>  date('Y-m-d H:i:s'),
            ];
        }elseif($request->menu_type==2){
            $menu_data = [
                'display_name'  =>  e($request->display_name),
                'menu_name'     =>  e(str_replace(' ','_',$request->menu_name)),
                'order'         =>  e(intval($request->order)),
                'desc'          =>  e($request->desc),
                'uri'           =>  e($request->uri),
                'pid'           =>  e($request->pid),
                'creator'       =>  session('user_id'),
                'create_at'     =>  date('Y-m-d H:i:s'),
            ];
        }

        if($menu_data){
            $create = Menus::create($menu_data);
            if($create)
                return redirect('admin/menu_manage')->with('success','新菜单添加成功！');
        }
        $message = '数据保存失败！请检查后重新提交数据！';
        return redirect()->back()->withInput()->with('error' , $message);



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menus::with('hasOneParent')->with('hasOneCreator')->find($id);

        return view('admin.menu.show' , compact('menu' , $menu));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $menu = Menus::find($id);
        $p_menus = Menus::where('pid',0)->get();
        dump($menu);
        dump($p_menus);
//        dump('This is edit method ! '.$id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->all();
        dump($updateData);

        $target = Menus::find($id);
        dump($target);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sub_menus = Menus::find($id)->hasManySubMenus->toArray();
//        dump($sub_menus);

        if($sub_menus)
        {
            $key = 'fail';
            $message = '所指定的删除菜单尚有子菜单存在，请先删除子菜单，然后再来删除该菜单！';
        }else{
            /**
             * 判断菜单是否有用户在使用，如有，则不允许删除
             */
            $roleMenus = Menus::find($id)->hasRoles;
            $roles = [];

            if($roleMenus->toArray())
            {
                foreach ($roleMenus as $Key=>$singleMenu) {
                    $roleDetail = $singleMenu->hasOneRole->toArray();
                    $roles[$Key] = $roleDetail['display_name'];
                }
                $rolesHas = join(' , ' , $roles);
                $key = 'fail';
                $message = '该菜单目前尚有'.sizeof($roles).'个角色在使用，分别为： '.$rolesHas.' ，请先取消角色下的该菜单权限！';
            }else{

                if(Menus::destroy($id))
                {
                    $key = 'success';
                    $message = '指定的菜单删除成功！';
                }else{
                    $key = 'fail';
                    $message = '指定菜单删除失败！';
                }
            }
        }

        return redirect('admin/menu_manage')->with($key , $message);
    }
}
