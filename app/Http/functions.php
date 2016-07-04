<?php

/**
 * 用户自定义的公用函数 ！
 */


if(!function_exists('assets')){
    function assets($path_to_file){
        return public_path().'assets/'.$path_to_file;
    }
}

