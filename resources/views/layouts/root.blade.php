<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        @show
    </title>

    @section('css')
        <link rel="stylesheet" href="{{assets('plugins/bootstrap3.3/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{assets('plugins/bootstrap3.3/css/bootstrap-reset.css')}}">
    @show
    @section('head_js')
        <script src="{{assets('plugins/jquery-2.1.1.min.js')}}"></script>
        <script src="{{assets('plugins/bootstrap3.3/js/bootstrap.min.js')}}"></script>
    @show
</head>
<body>
<div>
    @section('header')
    @show
        <div class="pull-left left_menu">
            @section('left')
            @show
        </div>
        <div class="container">
            @section('content')
            @show
        </div>
    @section('right')
    @show
    @section('bottom')
    @show
</div>
</body>

@section('bottom_js')
@show

</html>