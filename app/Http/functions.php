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

