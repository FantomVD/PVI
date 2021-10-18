<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Post extends Controller
{
    public function renderPost(Request $request)
    {
        $post = $request->only('id');
        $post = PostService::getPostById($post['id']);
        $comments = CommentService::getComments($post['id']);
        return view('home.post', ["post"=>$post, "comments"=>$comments]);
    }

    public function removePost(Request $request)
    {
        $post = $request->only('id');
        $result = PostService::deletePostById($post['id']);
        return redirect()->to("panel");
    }
}
