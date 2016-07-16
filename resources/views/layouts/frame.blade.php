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
        <i class="fa fa-align-justify fa-2x" id="_toggle_font_" title="Align Justify"></i>
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

                    @foreach($userData['menus'] as $k=>$p_menu )
                        <li>
                            <a href="#">
                                <i class="{{$p_menu['menu_icon']}}"></i>{{$p_menu['display_name']}} </a>
                                @if(is_array($p_menu['sub_menus']))
                                    <ul class="submenu">
                                        @foreach($p_menu['sub_menus'] as $subk=>$submenu)
                                            <li>
                                                <a href="{{url($submenu['uri'])}}" class="">{{$submenu['display_name']}}</a>
                                            </li>
                                            @endforeach
                                    </ul>
                                    @endif
                        </li>
                        @endforeach

                    {{--<li class="active"><a href="#"><i class="fa fa-home"></i>Home </a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-glass"></i>Events </a></li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-camera-retro"></i>Gallery</a>--}}
                        {{--<span class="jquery-accordion-menu-label">12 </span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-cog"></i>Services </a>--}}
                        {{--<ul class="submenu">--}}
                            {{--<li><a href="#">Web Design </a></li>--}}
                            {{--<li><a href="#">Hosting </a></li>--}}
                            {{--<li><a href="#">Design </a>--}}
                                {{--<ul class="submenu">--}}
                                    {{--<li><a href="#">Graphics </a></li>--}}
                                    {{--<li><a href="#">Vectors </a></li>--}}
                                    {{--<li><a href="#">Photoshop </a></li>--}}
                                    {{--<li><a href="#">Fonts </a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Consulting </a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-home"></i>System </a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-suitcase"></i>Portfolio </a>--}}
                        {{--<ul class="submenu">--}}
                            {{--<li><a href="#">Web Design </a></li>--}}
                            {{--<li><a href="#">Graphics </a><span class="jquery-accordion-menu-label">10 </span></li>--}}
                            {{--<li><a href="#">Photoshop </a></li>--}}
                            {{--<li><a href="#">Programming </a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-user"></i>About </a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-envelope"></i>Contact </a></li>--}}

                </ul>
                <div class="jquery-accordion-menu-footer">
                    {{--Footer--}}
                </div>
            </div>
        </div>
    </div>


    @endsection


@section('content')
    @parent

    {{dump($userData)}}


    @endsection

@section('right')
    @parent
    @endsection

@section('bottom')
    @parent
    <div class="">@ Hello world This is the footer !</div>
    @endsection

@section('bottom_js')
    @parent
    <script src="{{assets('js/accordin.js')}}"></script>
    <script>
        $('#_toggle_font_').on('click' , function(){
            console.log($('#_left_menu_').css('display'));
            console.log($('#_sub_main_content_').css('display'));

        });
    </script>
    @endsection

