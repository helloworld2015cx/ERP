<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
 * 登录路由组
 * */
Route::group(['prefix'=>'login'] , function(){

    Route::get('/' , function(){
        if(session('user_id')){
            return redirect('admin');
        }
        return view('admin/login/login');
    });

    Route::post('login' , 'Admin\\LoginController@login');

});


/**
 * 禁止访问页面
 */
Route::group(['prefix'=>'forbidden'],function(){
    Route::get('menu' , function(){
        return view('admin.access-forbidden');
    });
});



/*
 * 基本管理界面路由组
 * */
Route::group(['prefix'=>'admin' , 'middleware'=>'login'] , function(){

    Route::get('/' , "Admin\\IndexController@index");
    Route::get('system',"Admin\\SystemController@index");
    Route::get('menu_manage' , "Admin\\MenuManageController@index");

});

Route::any('*' , function(){
    dump('This is the default route ! for those not match any !');
});
