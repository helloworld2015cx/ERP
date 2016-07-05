@extends('layouts.Admin.basic')

@section('title' , '')

@section('css')
    @parent
    <link rel="stylesheet" href="{{assets('css/page_frame/page_frame.css')}}">
@endsection

@section('head_js')
    @parent
@endsection

@section('head')
    <div class="basic-header">
        This is the header !
    </div>
@endsection

@section('left')


    <div class="frame_menu p_menu">
        <div class="">P_class 1</div>
        <div class="">P_class 2</div>
        <div class="">P_class 3</div>
        <div class="">P_class 4</div>
    </div>
    <div class="frame_menu sub_menu">
        <div class="">sub_class 1</div>
        <div class="">sub_class 2</div>
        <div class="">sub_class 3</div>
        <div class="">sub_class 4</div>
    </div>
    <div class="frame_menu d_menu">
        <div class="">d_class 1</div>
        <div class="">d_class 2</div>
        <div class="">d_class 3</div>
        <div class="">d_class 4</div>
    </div>

@endsection

@section('main_content')
@endsection

@section('right')
@endsection

@section('bottom')
@endsection

@section('tail_js')
    @parent
@endsection