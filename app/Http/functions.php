<?php

/**
 * 用户自定义的公用函数 ！
 */


if(!function_exists('assets')){
    function assets($path_to_file){
//        $server_scheme = $_SERVER['REQUEST_SCHEME'];
//        $server_host = $_SERVER['HTTP_HOST'];
        return '/assets/'.$path_to_file;
    }
}

