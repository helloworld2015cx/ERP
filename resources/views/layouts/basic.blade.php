@extends('layouts.structure')

@section('title' , 'Basic Structure')

@section('css')
    @parent
    @endsection

@section('head_js')
    @parent
    @endsection

@section('content')
    @endsection

@section('bottom')
    {{--<div>Hello world ! This is the bottom ! but not used in the sub-page !</div>--}}
    @endsection


@section('tail_js')

    @endsection