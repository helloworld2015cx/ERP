@extends('layouts.frame')

@section('title')
    Create New Menu
    @endsection

@section('css')
    @parent
    <style>
        .form-create{
            padding-bottom:10px;
            padding-left:10px;
            padding-right:10px;
        }
    </style>
    <link rel="stylesheet" href="{{assets('plugins/icheck/skins/all.css')}}">
    @endsection

@section('head_js')
    @parent

    <script src="{{assets('plugins/icheck/icheck.min.js')}}"></script>

    @endsection

@section('content')
    <section class="content-header">
        <h1 style="display: inline-block">
            新建菜单
            <small><a href="{{url('admin/menu_manage')}}">菜单管理</a></small>
        </h1>
        <ol class="breadcrumb pull-right">
            <li><a href=""><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">菜单管理 - 新建菜单</li>
        </ol>
    </section>

    <div class="content-area">
        <div class="box box-primary">
            <div class="box-header">

            </div>

            <div class="form form-create">
                <form action="" class="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="menu_display_name">菜单展示名</label>
                                <input id="menu_display_name" name="display_name" type="text" class="form-control" placeholder="请输入菜单展示名">
                            </div>
                            <div class="col-xs-6">
                                <label for="menu_name">菜单标识名(下划线连接的英文)</label>
                                <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="请输入菜单标识名">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <div class="col-xs-6">
                                <label for="menu_order">菜单排序</label>
                                <input id="menu_order" name="order" type="text" class="form-control" placeholder="请输入菜单排序">
                            </div>

                            <div class="col-xs-6" id="select_type">
                                <label for="menu_type">菜单类型</label><br>
                                &nbsp;&nbsp;
                                <input id="type_first" value="1" type="radio" name="menu_type">
                                <label for="type_first">一级菜单</label>
                                &nbsp;&nbsp;
                                <input id="type_second" value="2" type="radio" name="menu_type">
                                <label for="type_second">二级菜单</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6 hidden" id="menu_icon_box">
                                <label for="menu_icon">菜单图标 ( Font Awesome Icon 如: fa fa-user <i class="fa fa-user"></i>)</label>
                                <input type="text" class="form-control" name="uri" id="menu_icon" placeholder="请输入菜单使用图标">
                            </div>
                            <div class="col-xs-6 hidden" id="menu_uri_box">
                                <label for="menu_uri">菜单连接URI</label>
                                <input type="text" class="form-control" name="uri" placeholder="请输入要连接的URI">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>


    </div>

    @endsection

@section('bottom_js')

    <script>
        $(document).ready(function(){
            $('#select_type input').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
        });

        $first = $('#type_first');
        $second = $('#type_second');
        
        $first.on('ifChecked', function(event){
            $('#menu_icon_box').removeClass('hidden')
        });

        $first.on('ifUnchecked', function(event){
            $('#menu_icon_box').addClass('hidden')
        });

        $second.on('ifChecked' , function () {
            $('#menu_uri_box').removeClass('hidden');
        });

        $second.on('ifUnchecked' , function () {
            $('#menu_uri_box').addClass('hidden');
        });
    </script>
    @endsection


