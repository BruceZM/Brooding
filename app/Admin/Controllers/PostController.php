<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Type;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 文章列表页
    public function posts(){
         $posts = Post::paginate(5);

         return view("admin.posts",compact("posts"));
    }

    // 文章详情
    public function detail( $id){
       $post=Post::find($id);
       return view("admin/detail",compact("post"));
    }

       // 通过
    public function pass($id){
        $post=Post::find($id);
        $post->show = 1;
        $post->save();
        return back();
    }

   // 锁定
    public function lock($id){
        $post=Post::find($id);
        $post->show = 2;
        $post->save();
        return back();
    }

}
