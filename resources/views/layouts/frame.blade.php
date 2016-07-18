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
        <i class="fa fa-align-justify fa-1x" style="font-size: 23px" id="_toggle_font_" title="Align Justify"></i>
        <div class="header-flg">Hello World !</div>
    </div>
    @endsection
@section('left')
    @parent
    <div class="zzsc-container">
        <div class="content">
            <div id="jquery-accordion-menu" class="jquery-accordion-menu red">
                <div class="jquery-accordion-menu-header" id="form">
                    Header
                </div>
                <ul id="demo-list">

                    @if(!$userData)
                        <?php $userData = getUserData();?>
                    @endif

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
    <div class="">@ Hello world This is the footer !</div>
    @endsection

@section('bottom_js')
    @parent
    <script src="{{assets('js/accordin.js')}}"></script>
    <script>
        var $changeToWidth = window.outerWidth;
        $menus = $('#_left_menu_');

        $('#_toggle_font_').on('click' , function(){
            if($menus.css('display')=='block') {
                $menus.hide(200);
                $('.main-content').css('width', $changeToWidth * 0.99).css('display', 'block');
            }else if($menus.css('display','none')){
                $menus.show(200);
                $('.main-content').css('width', $changeToWidth * 0.807).css('display', 'inline-block');
            }
        });

    </script>
    @endsection

