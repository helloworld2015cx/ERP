<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/1
 * Time: 12:47
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{

    public function index(){

//        dump(Cache::get('current_user'));
        return view('admin.system.index');
    }




}