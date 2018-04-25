@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-default col-md-10">
        <div class="panel-heading">文章详情</div>
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <h3 class="text-center">{{$post->title}}</h3>

                        <p class="clearfix text-center">
                            <span >作 者: {{$post->user->name}}</span>&nbsp;&nbsp;
                            <span >时 间:{{$post->created_at}}</span>
                        </p>


                </div>
                <div class="panel-body">{{$post->body}}</div>
            </div>


        </div>

    </div>
@endsection
