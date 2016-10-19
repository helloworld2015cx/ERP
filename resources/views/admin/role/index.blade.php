@extends('layouts.frame')

@section('title')
    Menu Management
    @endsection

@section('css')
    @parent

    <style type="text/css">
        table tr td{
            padding:5px;
        }

        .create-btn{
            margin-bottom: 2px;
        }
        .create-btn a{
            background-color: #0099FF;
            border: none;
        }
        .alert-self-define{
            width:90%;
            margin:0 auto;
            margin-top:-10px;
        }

        .page-self{
            margin:0 auto;
        }

    </style>

    @endsection

@section('content')
    <section class="content-header">
        <h1 style="display: inline-block">
            角色列表
            <small><a href="">角色管理</a></small>
        </h1>
        <ol class="breadcrumb pull-right">
            <li><a href=""><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">角色管理 - 角色列表</li>
        </ol>
        <div class="row">
            <div class="col-xs-1 create-btn">
                <a href="{{url('admin/role_management/create')}}" class="btn btn-primary">新建角色</a>
            </div>
        </div>
    </section>

    <div class="content-area">
        <div class="box box-primary">

            <div class="box-header">
                <div class="box-title">
                    角色展示列表
                </div>
                <div class="box-tools">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm pull-right" name="s_title" value="{{$keyword}}"
                                   style="width: 150px;" placeholder="重点关键字名称">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible alert-self-define" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success ! </strong> {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger alert-dismissible alert-self-define" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Fail ! </strong> {{Session::get('fail')}}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <tr>
                        <th>操作</th>
                        <th>角色编号</th>
                        <th>角色展示名</th>
                        <th>角色名称</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>简要描述</th>
                        <th>角色管理菜单</th>
                        <th>角色用户</th>
                    </tr>


                    @foreach($data as $role_key=>$role_value)
                        <tr>
                            <td style="padding: 2px">
                                <a class="btn btn-primary btn-sm" href="{{url('admin/role_management',['id'=>$role_value->id])}}">
                                    <i class="fa fa-eye" title="查看" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="{{url('admin/role_management').'/'.$role_value->id.'/edit'}}">
                                    <i class="fa fa-pencil-square-o" title="修改" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-sm btn-danger delete_item" href="javascript:void(0)">
                                    <i class="fa fa-trash-o" title="删除" id="{{$role_value->id}}" aria-hidden="true"></i>
                                </a>
                                {{--<i class="fa fa-pencil fa-fw"></i>--}}
                                {{--<i class=""></i>--}}
                                {{--<i class="fa fa-trash-o fa-fw"></i>--}}
                            </td>
                            <td style="padding: 2px;padding-top:8px">{{$role_value->id}}</td>
                            <td style="padding: 2px;padding-top:8px">{{$role_value->display_name}}</td>
                            <td style="padding: 2px;padding-top:8px">{{$role_value->role_name}}</td>
                            <td style="padding: 2px;padding-top:8px">{{$role_value->create_at}}</td>
                            <td style="padding: 2px;padding-top:8px">{{$role_value->update_at}}</td>
                            <td style="padding: 2px;padding-top:8px">{{mb_substr($role_value->describe , 0 , 8)}} ...</td>
                            <td style="padding: 2px;padding-top:8px">xxx</td>
                            <td style="padding: 2px;padding-top:8px">xxxx</td>
                        </tr>
                    @endforeach

                </table>
                <div class="page-self">{{$data->links()}}</div>
            </div>
        </div>
        {{--<div class="panel panel-info">--}}
        {{--<div class="panel-heading">Heading</div>--}}
        {{--<div class="panel-body">This is panel body !</div>--}}
        {{--<div class="panel-footer">Footer</div>--}}
        {{--</div>--}}
    </div>
    <!--隐藏型删除表单-->
    <form method="post" action="{{ url('admin/role_management/') }}" accept-charset="utf-8" id="hidden-delete-form">
        <input name="_method" type="hidden" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    @endsection

@section('bottom_js')

    @parent
    <script src="{{assets('plugins/layer2.3/layer.js')}}"></script>
    <script>
        $('.delete_item').click(function(){
            var id = $(this).find('i').attr('id');
            var action = '{{ url('admin/role_management/') }}';
            var new_action = action + '/' + id;
            $('#hidden-delete-form').attr('action', new_action);
            layer.confirm('是否确定要删除当前角色，删除之后将无法继续使用。',function(index){
                $('#hidden-delete-form').submit();
                layer.close(index);
            });
        });
    </script>

@endsection