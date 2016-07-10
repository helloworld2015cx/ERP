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

    public function index(){
//        $current_user = User::getUserIdentity(session('user_id'));
//        dump($current_user);
        dump(Cache::get('current_user'));
    }

}