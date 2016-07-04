@extends('layouts.basic')

@section('title' , 'Login Page')

@section('css')
    @parent
    <style>
        *{
            margin:0;
            padding:0;
            border:0;
        }
        .message{
            padding:10px;
            margin:5px auto;
            box-shadow: 0 0 5px #777;
            font-family: Consolas;
            font-size: 15px;
            width:80%;
        }
    </style>
    @endsection

@section('head_js')
    @parent
    @endsection

@section('content')
    @parent

    <div class="message">This is login page !</div>

    @endsection

@section('tail_js')

    @endsection
