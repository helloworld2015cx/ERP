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
//    dump('Hello World !');
    return view('welcome');
});


Route::get('app/' , function(){
    dump('Hello World ! 123 ');
});

Route::group(['prefix'=>'login'] , function(){
    Route::get('/' , function(){
        if(session('user_id')){
            return redirect('admin');
        }
        return view('admin/login/login');
    });
    Route::post('login' , 'Admin\\LoginController@login');
});


Route::group(['prefix'=>'admin' , 'middleware'=>'login'] , function(){

    Route::get('/' , "Admin\\IndexController@index");

});
