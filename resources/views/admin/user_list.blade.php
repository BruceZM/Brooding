@extends('admin.layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">用户列表</div>
            <div class="panel-body">
                 <table class="table">
                      <tr>
                          <th>id</th>
                          <th>用户名</th>
                          <th>编辑</th>
                      </tr>
                      @forelse($users as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td>{{$user->name}}</td>
                              <td>
                                 [ <a href="#">编辑</a>]&nbsp;
                                 [ <a href="#">删除</a>]
                                  [ <a href="{{route('roles',["id"=>$user->id])}}">角色</a>]
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="3">没有用户呢!</td>
                          </tr>
                      @endforelse
                 </table>
            </div>
        </div>

    </div>

@endsection
