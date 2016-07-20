<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Model\Users\Menus;
use Illuminate\Support\Facades\Cache;

class MenuManageController extends Controller
{



    public function __init__(){
//        dump('___Enter Here ____'.__METHOD__);
        if(!can('menu_manage')){
            $this->middleware('access_denied');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //'id,menu_name,display_name,order,uri,creator,create_at,update_at'
        $menus = Menus::select(['id','pid','menu_name','display_name','uri','creator','create_at','update_at'])
            ->with('hasOneCreator')
            ->with('hasOneParent')
            ->paginate(10);
//            ->get();//->toArray();

        return view('admin.menu.index' , compact('menus' , $menus));


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

//        dump($menu_data);
        if($menu_data){
            $create = Menus::create($menu_data);
//            $create = true;
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
        //
        dump($id);
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

        dump('This is edit method ! '.$id);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        dump(__METHOD__.' is in use '.$id);
    }
}
