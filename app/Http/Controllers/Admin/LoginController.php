<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Model\Users\User;

/**
 * Class LoginController
 * @package App\Http\Controllers\Admin
 *
 * deal user login !
 *
 */


class LoginController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $find = User::where('username' , $username)->where('password' , md5(md5($password)))->take(1)->get()->toArray();

        if($find){
            session(['user_id'=>$find[0]['id']]);
        }else{
            return redirect()->back()->withInput(['username'=>$request->input('username')]);
        }
        return redirect('admin');
    }
}
