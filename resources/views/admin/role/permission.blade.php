
@extends('admin.layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">权限列表</div>
            <div class="panel-body">
                <h3>【{{$role->name}}】的权限:<a href="{{route('rolelist')}}">返回</a> </h3>
                <form action="{{route('savepm',['role'=>$role->id])}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">

                        @foreach($permissions as $permission)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="permissions[]"
                                           @if ($myPermissions->contains($permission))
                                           checked
                                           @endif
                                           value="{{$permission->id}}">
                                    {{$permission->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection






