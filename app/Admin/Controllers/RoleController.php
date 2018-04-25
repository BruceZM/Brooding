<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /*
     * 用户列表
     */
    public function index()
    {
        $roles = \App\AdminRole::paginate(10);
        return view('/admin/role/index', compact('roles'));
    }

    /*
     * 创建角色
     */
    public function create()
    {
        return view('/admin/role/add');
    }

    /*
     * 创建角色
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        \App\AdminRole::create(request(['name', 'description']));
        return redirect('/admin/roles');
    }

    /*
     * 角色的权限
     */
    public function permission(\App\AdminRole $role)
    {
        $permissions = \App\AdminPermission::all();
        $myPermissions = $role->permissions;
        return view('/admin/role/permission', compact('permissions', 'myPermissions', 'role'));
    }

    /*
     * 保存权限
     */
    public function storePermission(\App\AdminRole $role)
    {
        /*
        $this->validate(request(),[
           'permissions' => 'required|array'
        ]);
        */

        $permissions = \App\AdminPermission::find(request('permissions'));
        if(!$permissions){
            $permissions=collect([]);
        }
        $myPermissions = $role->permissions;

        // 对已经有的权限
        $addPermissions = $permissions->diff($myPermissions);
        foreach ($addPermissions as $permission) {
            $role->grantPermission($permission);
        }

        $deletePermissions = $myPermissions->diff($permissions);
        foreach ($deletePermissions as $permission) {
            $role->deletePermission($permission);
        }
        return back();
    }

}
