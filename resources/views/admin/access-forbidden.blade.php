@extends('layouts.frame')


@section('title')
    Access Target Page Forbidden !
    @endsection

@section('css')
    @parent
    <style>
        .forbidden_message{
            margin:10px auto;
            border-radius: 3px;
            font-size: 20px;
            font-family: "微软雅黑", helvetica, arial, sans-serif;
            box-shadow: 0 0 10px #555;
            border-top: 1px solid #eee;
            border-left:1px solid #ddd;
            color:#990000;
            line-height: 2em;
            background-color:#cccccc;
            min-height: 50px;
            padding:5px;
        }

        .sub_message{
            font-size:16px;
        }
    </style>
    @endsection


@section('content')

    <div class="row forbidden_message">
        <div class="col-sm-10 col-md-offset-1 center"> Access denied here !</div>
        <div class="col-sm-12 sub_message">
            You seems can't access to the target page ! If you really need the priority , please connect the administrator !
        </div>
    </div>

    {{--@parent--}}


    @endsection
