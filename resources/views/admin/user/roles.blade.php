@extends('admin.layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">角色列表</div>
            <div class="panel-body">
                <h3>【{{$user->name}}】的角色:</h3>
                <form action="{{route('saverole')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="form-group">
                        @foreach($roles as $role)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="roles[]"
                                           @if ($myRoles->contains($role))
                                           checked
                                           @endif
                                           value="{{$role->id}}">
                                    {{$role->name}}
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

