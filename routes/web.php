<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/m', function () {
    return view('m.master');
});
Route::get('/m_myfavorite', 'PostController@m_myfavorite')->name('m_myfavorite');
Route::get('/m_post', 'PostController@m_post')->name('m_post');
Route::get('/m_detail/{id}', 'PostController@m_detail')->name('m_detail');
Route::get('/m_search/{word}', 'PostController@m_search')->name('m_search');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// 文章首页
Route::get('/home', 'PostController@index')->name('home');

// 分类下的文章
Route::get('/type/{id}', 'PostController@type');

//发布文章
Route::get('write', 'PostController@write')->name('write');
Route::post('save', 'PostController@save')->name('save');

// 我的收藏
Route::get('myfavorite', 'PostController@myfavorite')->name('myfavorite');

// 收藏文章
Route::get('favorite/{id}', 'PostController@favoritePost')->name('favorite');
// 取消收藏
Route::get('unfavorite/{id}', 'PostController@unFavoritePost')->name('unfavorite');

// 获取栏目信息
Route::get('types', 'PostController@types')->name('types');

require_once ("admin.php");