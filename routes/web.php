<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function (\Illuminate\Http\Request $request) {
    $req = $request->only('search', 'size', 'page');
    $size = $req['size'] ?? 3;
    $page = $req['page'] ?? 1;
    $search = $req['search'] ?? '%%';
    $posts = \App\Services\PostService::getAllPosts($search, $size, $page, true);
    $nextPage = $page+1;
    $previousPage = $page-1;
    $last = json_decode(json_encode($posts))->last_page;
    return view('home.index', ["last"=>$last, "posts"=>$posts, "page"=>$page, "nextPage"=>$nextPage,"previousPage"=>$previousPage]);
});

Route::get('/test', 'App\Http\Controllers\test@test');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/panel', function () {
    $posts = \App\Services\PostService::getAllPosts();
    return view('panel.index', ["posts"=>$posts]);
});

Route::get('/home/post', 'App\Http\Controllers\Post@renderPost');

Route::get('/panel/edit', 'App\Http\Controllers\Panel@getEditPost');

Route::post('/login', 'App\Http\Controllers\Account@authenticate');
Route::post('/register', 'App\Http\Controllers\Account@store');
Route::get('/logout', 'App\Http\Controllers\Account@destroy');

Route::post('/panel/edit', 'App\Http\Controllers\Panel@editPost');
Route::post('/comment', 'App\Http\Controllers\Comment@createComment');
Route::get('/panel/remove', 'App\Http\Controllers\Post@removePost');
