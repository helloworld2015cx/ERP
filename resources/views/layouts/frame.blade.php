@extends('layouts.root')

@section('title')
    Admin first page
    @endsection

@section('css')
    @parent
    <link rel="stylesheet" href="{{assets('css/frame.css')}}">
    <link rel="stylesheet" href="{{assets('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{assets('plugins/jquery-accordion-menu.css')}}">
    <link rel="stylesheet" href="{{assets('css/zzsc-demo.css')}}">
    @endsection

@section('head_js')
    @parent
    <script src="{{assets('plugins/jquery-accordion-menu.js')}}"></script>
    @endsection

@section('header')
    @parent

    <div class="frame_header">
        <i class="fa fa-align-justify fa-2x" title="Align Justify"></i>
        <div class="header-flg">Hello World !</div>
    </div>
    @endsection
@section('left')
    @parent
    <div class="zzsc-container">
        <div class="content">
            <div id="jquery-accordion-menu" class="jquery-accordion-menu red">
                <div class="jquery-accordion-menu-header" id="form"></div>
                <ul id="demo-list">

                    <li class="active"><a href="#"><i class="fa fa-home"></i>Home </a></li>
                    <li><a href="#"><i class="fa fa-glass"></i>Events </a></li>
                    {{--<li>
                        <a href="#"><i class="fa fa-camera-retro"></i>Gallery</a>
                        <span class="jquery-accordion-menu-label">12 </span>
                    </li>--}}
                    <li>
                        <a href="#"><i class="fa fa-cog"></i>Services </a>
                        <ul class="submenu">
                            <li><a href="#">Web Design </a></li>
                            <li><a href="#">Hosting </a></li>
                            <li><a href="#">Design </a>
                                <ul class="submenu">
                                    <li><a href="#">Graphics </a></li>
                                    <li><a href="#">Vectors </a></li>
                                    <li><a href="#">Photoshop </a></li>
                                    <li><a href="#">Fonts </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Consulting </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-home"></i>System </a></li>
                    <li><a href="#"><i class="fa fa-suitcase"></i>Portfolio </a>
                        <ul class="submenu">
                            <li><a href="#">Web Design </a></li>
                            <li><a href="#">Graphics </a><span class="jquery-accordion-menu-label">10 </span></li>
                            <li><a href="#">Photoshop </a></li>
                            <li><a href="#">Programming </a></li>
                        </ul>
                    </li>
                    {{--<li><a href="#"><i class="fa fa-user"></i>About </a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-envelope"></i>Contact </a></li>--}}

                </ul>
                <div class="jquery-accordion-menu-footer">
                    Footer
                </div>
            </div>
        </div>
    </div>


    @endsection


@section('content')
    @parent
    @endsection

@section('right')
    @parent
    @endsection

@section('bottom')
    @parent
    @endsection

@section('bottom_js')
    @parent
    <script src="{{assets('js/accordin.js')}}"></script>
    @endsection

