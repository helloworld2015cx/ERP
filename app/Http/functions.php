<?php

/**
 * 用户自定义的公用函数 ！
 */


if(!function_exists('assets')){
    function assets($path_to_file){
//        $server_scheme = $_SERVER['REQUEST_SCHEME'];
//        $server_host = $_SERVER['HTTP_HOST'];
        $enterFile =explode('/' , trim($_SERVER['SCRIPT_NAME'] , '/'));
        if(sizeof($enterFile) > 1){
            array_pop($enterFile);
            $enterPath = implode('/' , $enterFile);
            return '/'.$enterPath.'/assets/'.$path_to_file;
        }
        return '/assets/'.$path_to_file;
    }
}


if(!function_exists('user')){
    function user($condition){

    }
}

if(!function_exists('can')){
    function can($menu_name){
        if($current_user = \Illuminate\Support\Facades\Cache::get('current_user')){
//            $allUserMenus = $current_user['menus'];
        }else{
            $current_user = \Model\Users\User::getUserIdentity(session('user_id'));
        }

        $allUserMenus = $current_user['menus'];

        return recursiveFindInArrayByKey($allUserMenus , $menu_name);
    }
}

if(!function_exists('recursiveFindInArrayByKey')){

    function recursiveFindInArrayByKey($arr , $key){

        foreach($arr as $k=>$value){
            if($key==$value['menu_name']){
                return true;
            }else{
                if(is_array($value['sub_menus'])){
                    return recursiveFindInArrayByKey($value['sub_menus'] , $key);
                }
            }
        }

        return false;

    }
}



