@extends('layouts.structure')

@section('title' , 'Basic Structure')

@section('css')
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
    <script src="{{assets('plugins/js/jquery/jquery.min.js')}}"></script>
    @endsection

@section('content')
    <div class="message">Hello World ! This is the main content !</div>
    @endsection

@section('tail_js')

    @endsection