@extends('layouts.root')

@section('title')
    Login Page !
    @endsection

@section('css')
    @parent
    <link rel="stylesheet" href="{{assets('css/login.css')}}">
    @endsection

@section('head_js')
    @parent
    @endsection

@section('content')
    {{--@parent--}}
    <div class="container login-panel">
        <div class="panel center-block panel-self-define login-header"> Sign in to ERP System</div>
        <div class="panel panel-default center-block panel-self-define">
            <div class="panel-heading panel-heading-self"> Login Here </div>
            <div class="panel-body">

                <form action="{{url("login/login")}}" id="loginForm" class="form from-self center-block" method="post">
                    <div class="row">
                        <div class="form-group from-group-self">
                            <label class="input-label" for="">Username </label>
                            <input type="text" name="username" value="{{old('username')}}" placeholder="Please input your login name here" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="input-label" for="">Password </label>
                            <input type="password" name="password" placeholder="Input your login password here" class="form-control">
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>

            <div class="panel-footer">
                <button class="btn btn-success center-block" id="login" style="width:90%;margin-bottom:10px;">Login</button>
            </div>
        </div>
    </div>

    @endsection

@section('bottom_js')
    <script>
        $('#login').on('click' , function(){
            $('#loginForm').submit();
        });
    </script>
    @endsection
