@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-default col-md-10">
        <div class="panel-heading">文章列表</div>
        <div class="panel-body">
           <table class="table">
               <tr>
                   <th>id</th>
                   <th>作 者</th>
                   <th>标 题</th>
                   <th>状 态</th>
                   <th>审 核</th>
                   <th>管 理</th>
               </tr>
               @forelse($posts as $post)
               <tr>
                   <td>{{$post->id}}</td>
                   <td>{{$post->user->name}}</td>
                   <td>{{$post->title}}</td>
                   <td>{{$post->state==1?"公开":"私有"}}</td>
                   <td>
                       @if($post->show==0)未审核
                       @elseif($post->show==1)通过
                       @else 锁定
                       @endif
                   </td>
                   <td>
                       <div class="dropdown">
                           <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                               审核
                               <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                               <li><a href="{{url("admin/detail/$post->id")}}">查看详情</a></li>
                               <li><a href="{{url("admin/pass/$post->id")}}">通过</a></li>
                               <li><a href="{{url("admin/lock/$post->id")}}">锁定</a></li>

                           </ul>
                       </div>
                   </td>
               </tr>
               @empty
                <tr>
                    <td colspan="5">没有文章呢</td>
                </tr>
               @endforelse
           </table>

        </div>
        {{$posts->links()}}
    </div>
@endsection
