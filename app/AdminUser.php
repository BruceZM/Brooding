<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $guarded=["id"];
    protected $rememberTokenName = '';

    // 当前用户有哪些全权限
    public function roles()
    {
        return $this->belongsToMany(\App\AdminRole::class, 'admin_role_user', 'user_id', 'role_id')->withPivot(['user_id', 'role_id']);
    }

    /*
     * 当前用户是否拥有某个角色
     */
    public function isInRoles($roles)
    {
        return !! $roles->intersect($this->roles)->count();
    }

    /*
     * 是否有权限
     */
    public function hasPermission($permission)
    {
        return $this->isInRoles($permission->roles);
    }

    /*
     * 给用户分配角色
     */
    public function assignRole($roleName)
    {
        $role = \App\AdminRole::where('name', $roleName)->first();
        return $this->roles()->save($role);
    }

    /*
     * 删除user和role的关联
     */
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }




}
