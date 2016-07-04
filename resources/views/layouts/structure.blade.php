<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
@section('css')
    <link rel="stylesheet" href="{{assets('plugins/bootstrap3.3/css/bootstrap.min.css')}}">
    @show
@section('head_js')
    <script src="{{assets('plugins/jquery3.min.js')}}"></script>
    <script src="{{assets('plugins/bootstrap3.3/js/bootstrap.min.js')}}"></script>
    @show
<body>
@section('content')
    @show

@section('bottom')
    @show

</body>
@section('tail_js')
    @show
</html>