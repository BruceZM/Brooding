@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">文章分类</div>
                <ul class="list-group">

                    @forelse ($types as $type)
                        <li class="list-group-item"  >
                           <a href="{{url("type/$type->id")}}">{{$type->name}}</a>
                        </li>
                    @empty
                        <li>还没有栏目呢</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">文章列表</div>

                <div class="panel-body">

                    @forelse ($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ $post->title }}
                            </div>

                            <div class="panel-body">
                                {{ $post->body }}
                            </div>
                            @if (Auth::check())
                                <div class="panel-footer">
                                   <favorite
                                       :post={{$post->id}}
                                       :favorited={{$post->favorited()?"true":"false"}}
                                   ></favorite>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p>还没有文章呢</p>
                    @endforelse
                        {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
