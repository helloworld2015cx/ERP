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
<div class="admin-page-content">
    @section('header')
    @show
        <div class="second_row">
            <div class="pull-left left_menu">
                @section('left')
                @show
            </div>
            <div class="container main-content">
                <div class="col-xs-12 sub-main-content">
                    @section('content')

                        <div class="">Hello World !</div>

                    @show
                </div>
            </div>
            @section('right')
            @show
        </div>
        <div class="third_row">
            @section('bottom')
                <div class="">@ Hello world This is the footer !</div>
            @show
        </div>
</div>
</body>

@section('bottom_js')
@show

</html>