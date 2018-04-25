<?php
/**
 * Created by PhpStorm.
 * User: hxsd
 * Date: 2018/4/6
 * Time: 10:51
 */


Route::group(["middleware"=>"auth:admin"],function(){

    Route::get('admin/index', '\App\Admin\Controllers\AdminController@index');

    Route::group(["middleware"=>"can:post"],function(){
        // post
        Route::get('admin/detail/{id}', '\App\Admin\Controllers\PostController@detail');
        Route::get('admin/pass/{id}', '\App\Admin\Controllers\PostController@pass');
        Route::get('admin/lock/{id}', '\App\Admin\Controllers\PostController@lock');
        Route::get('admin/posts', '\App\Admin\Controllers\PostController@posts');
    });

    Route::group(["middleware"=>"can:system"],function(){

        Route::get('admin/user_list', '\App\Admin\Controllers\AdminUserController@user_list')->name("list");
        Route::get('admin/add_user', '\App\Admin\Controllers\AdminUserController@add_user');
        Route::post('admin/save', '\App\Admin\Controllers\AdminUserController@save')->name("save");

        Route::get('admin/user/{user}/roles', '\App\Admin\Controllers\AdminUserController@roles')->name("roles");
        Route::post('admin/user/saverole', '\App\Admin\Controllers\AdminUserController@saverole')->name("saverole");

        // role-permission
        Route::get('admin/role/index', '\App\Admin\Controllers\RoleController@index')->name("rolelist");
        Route::get('admin/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission')->name("pmlist");
        Route::post('admin/roles/{role}/permission', '\App\Admin\Controllers\RoleController@storePermission')->name("savepm");
    });


});


// 登录验证
Route::get('admin/login', '\App\Admin\Controllers\AdminUserController@login')->name("adminlogin");
Route::post('admin/dologin', '\App\Admin\Controllers\AdminUserController@dologin')->name("dologin");
Route::post('admin/logout', '\App\Admin\Controllers\AdminUserController@logout')->name("adminlogout");


