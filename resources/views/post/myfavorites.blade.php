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
                        <li class="list-group-item"><a href="{{url('myfavorite')}}">我的收藏</a> </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">收藏文章</div>

                    <div class="panel-body">
                        @forelse ($myfavorites as $myfavorite)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ $myfavorite->title }}
                                </div>

                                <div class="panel-body">
                                    {{ $myfavorite->body }}
                                </div>

                            <div class="panel-footer">
                                <a href="{{url("unfavorite/$myfavorite->id")}}">取消收藏</a>
                            </div>

                            </div>
                        @empty
                            <p>还没有收藏文章呢</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
