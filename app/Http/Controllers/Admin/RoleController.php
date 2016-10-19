<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 11:36
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class RoleController extends Controller
{

    /**
     * Judge if user has target priority to operate following operations .
     */
    protected function __init__()
    {
        if (!can('role_management') ) {
            $this->middleware('access_denied');
        }
    }

    public function index(Request $request)
    {
        dump('Hello world !');
    }

}