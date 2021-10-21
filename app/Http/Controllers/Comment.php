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
        $req = $request->only('message', 'post_id', 'user_id');
        $post_id = $req['post_id'];
        $comment = CommentService::createComment($req['message'], $post_id, auth()->user()->id );
        return redirect()->to("home/post?id=$post_id");
    }

    public function updateComment(Request $request){
        $req = json_decode($request->getContent());
        CommentService::updateComment($req->comment_id, $req->message);
        return response('Success', 200);
    }

    public function deleteComment($id){
        CommentService::deleteComment($id);
        return response('Success', 200);
    }
}
