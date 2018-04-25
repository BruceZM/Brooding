@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">个人中心</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">基本设置</a> </li>
                        <li class="list-group-item"><a href="#">重置密码</a> </li>
                        <li class="list-group-item"><a href="#">发布文章</a> </li>
                        <li class="list-group-item"><a href="#">我的文章</a> </li>
                        <li class="list-group-item"><a href="{{"myfavorite"}}">我的收藏</a> </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">发布文章</div>

                    <div class="panel-body">
                       <form class="form-horizontal" method="post" action="{{url('save')}}" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <div class="form-group">
                               <label class="control-label col-md-2">标 题:</label>
                               <div class="col-md-10">
                                   <input type="text" class="form-control" name="title">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="control-label col-md-2">栏 目:</label>
                               <div class="col-md-10">
                                   <select class="form-control" name="type_id">
                                       @foreach($types as $type)
                                           <option value="{{$type->id}}">{{$type->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="control-label col-md-2">图 片:</label>
                               <div class="col-md-10">
                                   <input type="file" class="form-control" name="pic" />
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="control-label col-md-2">内 容:</label>
                               <div class="col-md-10">
                                   <textarea class="form-control" rows="15" name="body"></textarea>
                               </div>
                           </div>

                           <div class="form-group">
                               <label class="control-label col-md-2" ></label>
                               <div class="radio col-md-10">
                                   <label>
                                       <input type="radio" name="state"  value="1" checked >公开
                                   </label>
                                   <label>
                                       <input type="radio" name="state"  value="0" >私有
                                   </label>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-10 col-md-offset-2">
                                   @include("layouts.error")
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-default">发布文章</button>
                               </div>
                           </div>

                       </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
