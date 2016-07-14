<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: /2016/7/9/
 * Time: 22:53
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Model\Users\User;


class SystemController extends Controller
{


    public function __init__(){
        if(!can('menu_manage')){
            return view('');
        }
        return true;
//        return view('');
    }


    public function index(){
//        $current_user = User::getUserIdentity(session('user_id'));
//        dump($current_user['menus']);
        dump(Cache::get('current_user'));

//        dump(User::orderMenus($current_user['menus']));

//        $seperated = self::formatMenus($current_user['menus']);
//        dump($seperated);

    }




}