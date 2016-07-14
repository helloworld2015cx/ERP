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
        $current_user = User::getUserIdentity(session('user_id'));
        dump($current_user['menus']);
//        $data = [[1,'hello','world'],[0,'cheng','xiang'],[2,'shao','kai']];
//        $order = [1,0,2];
//        array_multisort($order , SORT_ASC , $data);
//        dump($data);
//        dump(Cache::get('current_user'));

//        $testArr = [0,1,2,[2,3,0,['Hello','world']],['cheng','xiang']];
//        self::recursivePrint($testArr);

    }

    private static function recursivePrint($testArr)
    {
        foreach($testArr as $key=>$value) {
            if(is_array($value)) {
                self::recursivePrint($value);
            } else {
                echo $value."<br>";
            }
        }

    }

}