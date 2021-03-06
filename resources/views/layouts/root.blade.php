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
            <div class="pull-left left_menu" id="_left_menu_">
                @section('left')
                @show
            </div>
            <div class="show_content">
                <div class="container main-content">
                    <div class="col-xs-12 sub-main-content" id="_sub_main_content_">
                        @section('content')

                            <div class="">Hello World !</div>

                        @show
                    </div>
                </div>
            </div>
            @section('right')
            @show
        </div>
        <div class="third_row">
            @section('bottom')

            @show
        </div>
</div>
</body>

@section('bottom_js')
@show

</html>