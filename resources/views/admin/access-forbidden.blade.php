@extends('layouts.frame')


@section('title')
    Access Target Page Forbidden !
    @endsection

@section('css')
    @parent
    <style>
        .forbidden_message{
            width:80%;
            margin:10px auto;
            border-radius: 4px;
            box-shadow: 0 0 5px #555;
            border-top: 1px solid #333;
            border-left:1px solid #444;
            color:#990000;
            background-color:#FF9900;

            padding:5px;
        }
    </style>
    @endsection


@section('content')

    <div class="forbidden_message"> Access denied here !</div>


    @parent


    @endsection
