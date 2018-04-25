@extends('admin.layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">增加用户</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{route('save')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-2">用户名:</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">密 码:</label>
                        <div class="col-md-10">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">确 认:</label>
                        <div class="col-md-10">
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            @include("admin.layouts.error")
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">保 存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
