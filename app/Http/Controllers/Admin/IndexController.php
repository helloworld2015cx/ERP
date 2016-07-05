<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/1
 * Time: 12:47
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index(){
//        dump('You have successfully login !');

        return view('admin.system.index');
    }




}