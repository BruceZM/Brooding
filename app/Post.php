<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{
    protected  $guarded=["id"];


    // 判断当前文章是否收藏
    public function favorited(){

        return (bool) Favorite::where('user_id', Auth::id())
            ->where('post_id', $this->id)
            ->first();
    }

    // 一对一关联关系
    public function user(){
        return $this->belongsTo("App\User");
    }



}
