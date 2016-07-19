<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function sendmail(){
//        dump('Hello World !'.__METHOD__);

        $re = Mail::send('mails.testmail' , [] ,function($mailer){
            $mailer->to('18289768853@163.com' , 'chengxiang')->subject('Hello World ! Tester !');
        });

        if($re){
            dump('Success !');
        }else{
            dump('Failed !');
        }


    }


}
