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
    $req = $request->only('search', 'size', 'page', 'category_id');
    $size = $req['size'] ?? 3;
    $page = $req['page'] ?? 1;
    $search = $req['search'] ?? '%%';
    $category_id = $req['category_id'] ?? 0;
    $categories = \App\Services\CategoryService::getAllCategories();
    $posts = \App\Services\PostService::paginatePosts($search, $size, $page, $category_id);
    $nextPage = $page+1;
    $previousPage = $page-1;
    $last = json_decode(json_encode($posts))->last_page;
    $search = str_replace('%', '', $search);

    return view('home.index', ["search"=>$search, "category_id"=>$category_id, "categories"=>$categories,"last"=>$last, "posts"=>$posts, "page"=>$page, "nextPage"=>$nextPage,"previousPage"=>$previousPage]);
});

Route::get('/test', 'App\Http\Controllers\test@test');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/panel', function (\Illuminate\Http\Request $request) {
    $posts = \App\Services\PostService::getPostToEdit(auth()->user()->id, auth()->user()->isAdmin);
    $categories = \App\Services\CategoryService::getAllCategories();

    return view('panel.index', ["posts"=>$posts, "categories"=>$categories]);
});

Route::get('/home/post', 'App\Http\Controllers\Post@renderPost');

Route::get('/panel/edit', 'App\Http\Controllers\Panel@getEditPost');

Route::post('/login', 'App\Http\Controllers\Account@authenticate');
Route::post('/register', 'App\Http\Controllers\Account@store');
Route::get('/logout', 'App\Http\Controllers\Account@destroy');

Route::post('/panel/edit', 'App\Http\Controllers\Panel@editPost');
Route::post('/comment', 'App\Http\Controllers\Comment@createComment');
Route::post('/update/comment', 'App\Http\Controllers\Comment@updateComment');


Route::get('/panel/remove', 'App\Http\Controllers\Post@removePost');

Route::post('/like', 'App\Http\Controllers\Like@toggleLike');
Route::put('/comment/{id}', 'App\Http\Controllers\Comment@updateComment');
Route::delete('/comment/{id}', 'App\Http\Controllers\Comment@deleteComment');
