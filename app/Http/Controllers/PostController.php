<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Type;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected function getName($data){
        foreach ($data as $k=>$post){
            $data[$k]['name']=$post->user->name;
        }
        return $data;
    }
    //移动端收藏
    public function m_myfavorite(){

        $myfavorites = Auth::user()->favorites;
        $data = $myfavorites->all();


        return $this->getName($data);


    }
    public function m_post(){
        $data = Post::paginate(5)->all();

        return $this->getName($data);
    }
    public function m_search($word){
        $data = Post::where('title','like','%'.$word.'%')->get();

        return $this->getName($data);
    }
    public function m_detail($id){
        $data = Post::find($id);
        $data['name'] = $data->user->name;
        return $data->toArray();

    }
    // 文章列表页
    public function index(){
         $posts = Post::where("show",1)->paginate(5);
         $types = Type::all();
         return view("post/index",compact("types","posts"));
    }

    // 分类下的文章
    public function type($id){
        $types = Type::all();
        $posts =Post::where("type_id",$id)->paginate(5);
        return view("post.index",compact("posts","types"));
    }

    // 发布文章
    public function write(){
        $types = Type::all();
        return view("post.write",compact("types"));
    }

    // 保存文章
    public function save(Request $request){

        // 验证
        $this->validate(request(),[
            "title"=>"required|string|min:3|max:25",
            "body"=>"required|string|min:6"
        ]);


        if ($request->hasFile('pic')) {
            $file = $request->file('pic');  //获取UploadFile实例
            if ( $file->isValid()) { //判断文件是否有效
                //$filename = $file->getClientOriginalName(); //文件原名称
                $extension = $file->getClientOriginalExtension(); //扩展名
                $filename = time() . "." . $extension;    //重命名
                $path=base_path("public\upload");
                $res=$file->move($path, $filename); //移动至指定目录
            }
        }

        if(!$res){
            return "pic upload fail";
        }


        // 逻辑
        $data = $request->except("_token");
        $data["user_id"]=Auth::id();
        $data["pic"]=$filename;

        // 保存
        Post::create($data);

    }

    // 我的收藏
    public function myfavorite(){

        $myfavorites = Auth::user()->favorites;

        return view("post.myfavorites",compact("myfavorites"));
    }

    // 收藏文章
    public function favoritePost($id){

        // 1 user_id
        // 2 post_id
        // 3 Favorite::save();

        Auth::user()->favorites()->attach($id);
        return back();

    }

    // 取消收藏
    public function unFavoritePost($id){

        Auth::user()->favorites()->detach($id);
        return back();

    }



}
