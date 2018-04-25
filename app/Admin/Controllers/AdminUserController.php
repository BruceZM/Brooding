<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use Illuminate\Support\Facades\Auth;
use App\AdminRole;

class AdminUserController extends Controller
{

    // 登录
    public function login(){
        return view("admin.login");
    }

    // 登录行为
    public function dologin(Request $request){

        $user = request(["name","password"]);

        if(Auth::guard("admin")->attempt($user)){
             return \Redirect("admin/index");
        }else{
            return \Redirect::back()->withErrors("用户名密码不匹配");
        }


    }

    // 登出
    public function logout(){
        Auth::guard("admin")->logout();
        return redirect("admin/login");
    }

    // 后台首页
    public function user_list(){
        $users = AdminUser::all();

        return view("admin.user_list",compact("users"));
    }

    public function add_user(){
        return view("admin.add_user");
    }

    public function save(Request $request){
        //dd($request->toArray());
        // 验证
        $this->validate($request,[
            "name"=>"required|min:3|max:6|unique:admin_users",
            "password"=>"required|min:3|max:6|confirmed"
        ]);

        // 逻辑
        $user=$request->except("_token","password_confirmation");

        $user["password"]=bcrypt($user["password"]);

        AdminUser::create($user);

        return back();

    }

    // 当前用户所有角色
    public function roles(AdminUser $user){

        $roles = AdminRole::all();
        $myRoles = $user->roles;
        return view('/admin/user/roles', compact('roles', 'myRoles', 'user'));
    }

    // 保存对于角色的修改
    public function saverole(Request $request)
    {
        $id = $request->id;
        $user = AdminUser::find($id);

        /*
        $this->validate(request(),[
            'roles' => 'required|array'
        ]);
        */

         //dd(request("roles"));

         //勾选的角色
         $roles = \App\AdminRole::find(request('roles'));

         if(!$roles){
             $roles=collect([]);
         }

         // 数组-->集合   collect([1,2,3])
         // 集合-->数组   $roles->all();

        // 我原来的角色
        $myRoles = $user->roles;

        // 对已经有的权限
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role) {
            $user->roles()->save($role);
        }

        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }
        return back();
    }

}
