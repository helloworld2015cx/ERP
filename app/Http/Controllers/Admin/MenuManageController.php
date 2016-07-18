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
            ->get();//->toArray();

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
