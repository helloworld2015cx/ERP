<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Model\Users\Menus;

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

//        dump($menus);exit;
//        dump('Hello World !'.__METHOD__);

        return view('admin.menu.index' , compact('menus' , $menus));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}