<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Comment extends Controller
{
    public function createComment(Request $request)
    {
        $req = $request->only('message', 'post_id');
        $post_id = $req['post_id'];
        $comment = CommentService::createComment($req['message'], $post_id, auth()->user()->id );
        return redirect()->to("home/post?id=$post_id");
    }
}
