@extends('layouts.frame')

@section('title')
    Menu manage
    @endsection

@section('css')
    @parent
    {{--<link rel="stylesheet" href="{{assets('plugins/FontAwesome3.2/font-awesome.min.css')}}">--}}
    @endsection


@section('content')

    <section class="content-header">
        <h1>
            菜单列表
            <small><a href="">菜单管理</a></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">菜单管理 - 菜单列表</li>
        </ol>

    </section>

    <div class="content-area">
        <div class="box box-primary">
            <div class="box-header">

                <div class="box-title">
                    菜单展示列表
                </div>

                <div class="box-tools">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm pull-right" name="s_title" value=""
                                   style="width: 150px;" placeholder="重点关键字名称">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            {{--{{dump($menus)}}--}}
            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <tr>
                        <th>操作</th>
                        <th>菜单编号</th>
                        <th>菜单名称</th>
                        <th>菜单连接</th>
                        <th>上级菜单</th>
                        <th>菜单创建人</th>
                    </tr>


                    @foreach($menus as $menu_key=>$menu_value)
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="{{url('admin/menu_manage',['id'=>$menu_value->id])}}">
                                    <i class="fa fa-eye" title="查看" aria-hidden="true"></i>
                                </a>

                                <a class="btn btn-success" href="{{url('admin/menu_manage').'/'.$menu_value->id.'/edit'}}">
                                    <i class="fa fa-pencil-square-o" title="修改" aria-hidden="true"></i>
                                </a>

                                <a class="btn btn-danger delete_item" href="javascript:void(0)">
                                    <i class="fa fa-trash-o" title="删除" data-id="{{$menu_value->id}}" aria-hidden="true"></i>
                                </a>

                                {{--<i class="fa fa-pencil fa-fw"></i>--}}
                                {{--<i class=""></i>--}}
                                {{--<i class="fa fa-trash-o fa-fw"></i>--}}
                            </td>
                            <td>{{$menu_value->id}}</td>
                            <td>{{$menu_value->display_name}}</td>
                            <td>{{$menu_value->uri}}</td>
                            <td>{{$menu_value->hasOneParent ? $menu_value->hasOneParent->display_name:''}}</td>
                            <td>{{$menu_value->hasOneCreator ? $menu_value->hasOneCreator->username : ''}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
        {{--<div class="panel panel-info">--}}
            {{--<div class="panel-heading">Heading</div>--}}
            {{--<div class="panel-body">This is panel body !</div>--}}
            {{--<div class="panel-footer">Footer</div>--}}
        {{--</div>--}}
    </div>
    <!--隐藏型删除表单-->
    <form method="post" action="{{ url('admin/menu_manage/') }}" accept-charset="utf-8" id="hidden-delete-form">
        <input name="_method" type="hidden" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('bottom_js')

    @parent
    <script src="{{assets('plugins/layer2.3/layer.js')}}"></script>
    <script>
        $('.delete_item').click(function(){
            var id = $(this).data('id');
            var action = '{{ url('admin/menu_manage/') }}';
            var new_action = action + '/' + id;
            $('#hidden-delete-form').attr('action', new_action);
            layer.confirm('是否确定要删除当前菜单，删除之后将无法继续使用。',function(index){
                $('#hidden-delete-form').submit();
                layer.close(index);
            });
        });
    </script>

    @endsection

