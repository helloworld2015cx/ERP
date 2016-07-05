@extends('layouts.basic')

@section('title' , 'Admin Basic Page !')


{{--  头部加载css样式 --}}
@section('css')
    @parent
    <link rel="stylesheet" href="{{assets('plugins/FontAwesome3.2/css/font-awesome.min.css')}}">
    @endsection


{{-- 头部加载的必要的 js --}}
@section('head_js')
    @parent

    @endsection


{{-- 页面头 --}}
<div class="basic-content">
    @section('head')
    @show

    {{-- 页面左侧栏 --}}
    @section('left')
    @show

    @section('main_content')
    @endsection

    {{-- 页面右侧栏 --}}
    @section('right')
    @show

    {{-- 页面底部信息区 --}}
    @section('bottom')
    @show

</div>

{{-- 尾部加载的 js --}}

@section('tail_js')
    @parent
    @endsection