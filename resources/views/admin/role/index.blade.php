@extends('admin.layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">角色列表</div>
            <div class="panel-body">
                 <table class="table table-bordered">
                    <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>角色名称</th>
                        <th>角色描述</th>
                        <th>操作</th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}.</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <a type="button" class="btn" href="{{route('pmlist',["id"=>$role->id])}}" >权限管理</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody></table>
            </div>
        </div>

    </div>

@endsection





