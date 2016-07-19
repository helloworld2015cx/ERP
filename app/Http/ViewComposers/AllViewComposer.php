<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: /2016/7/18/
 * Time: 21:38
 */

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Model\Users\User;

class AllViewComposer
{

//    private $user;


//    public function __construct(User $user){
//        $this->user = $user;
//    }




    public function compose(View $view){

        /**
         * 为什么会输出了三遍 ？？？ ！！！
         */
        //dump('111111111111');
        if($user_id = session('user_id')) {

            if($userData = Cache::get('userData')) {
                Cache::put('userData' , $userData , SYSTEM_CACHE_MINUTES);
            } else {
                $view->with('userData', User::getUserIdentity($user_id));
            }

            $view->with('userData', $userData);

        } else {

//            $view->with('userData', getUserData($user_id));

        }

    }




}