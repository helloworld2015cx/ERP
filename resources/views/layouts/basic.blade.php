@extends('layouts.structure')

@section('title')

    @endsection

@section('css')
    <link rel="stylesheet" href="{{assets('plugins/bootstrap3.3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{assets('plugins/bootstrap3.3/css/bootstrap-reset.css')}}">
    @endsection

@section('head_js')
    <script src="{{assets('plugins/jquery.js')}}"></script>
    <script src="{{assets('plugins/bootstrap3.3/js/bootstrap.min.js')}}"></script>
    {{--<script class="include" src="{{assets('plugins/jquery.dcjqaccordion.2.7.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/jquery.scrollTo.min.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/jquery.nicescroll.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/jquery.sparkline.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/owl.carousel.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/jquery.customSelect.min.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/respond.min.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/slidebars.min.js')}}"></script>--}}
    {{--<script src="{{assets('plugins/common-scripts.js')}}"></script>--}}
    @endsection

@section('main_content')
    @endsection


@section('bottom')
    {{--<div>Hello world ! This is the bottom ! but not used in the sub-page !</div>--}}
    @endsection


@section('tail_js')
    @parent
    @endsection