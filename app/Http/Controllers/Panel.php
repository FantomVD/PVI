<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class Panel extends Controller
{
    public function getEditPost(Request $request)
    {
        $postId = $request->only('id');
        $categories = \App\Services\CategoryService::getAllCategories();

        if (isset($postId)) {
            $post = PostService::getPostById($postId);
            return view('panel.edit', ["post"=>$post, "categories" => $categories]);
        }
        return view('panel.edit', ["categories" => $categories]);
    }

    public function editPost(Request $request)
    {
        $post = $request->only(['id', 'title', 'category_id', 'body']);
        if ($request->hasFile('image')) {
            $imageURL = request()->file('image')->store('public');
            $post['image'] = last(explode('/',$imageURL));
        }
        if (isset($post['id'])) {
            PostService::editPost($post['id'], $post);
        } else {
            PostService::createPost($post, auth()->user()->id);
        }

        return redirect('/panel');
    }


}
