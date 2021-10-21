<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentService
{
    public static function getComments($postId){
        return Comment::query()->with('user')->where('post_id', $postId)->get();
    }

    public static function createComment($message, $post_id, $user_id){
        $comment = new Comment();
        $comment['message'] = $message;
        $comment['post_id'] = $post_id;
        $comment['user_id'] = $user_id;
        return $comment->save();
    }

    public static function updateComment($id, $message){
        $comment = Comment::query()->where('id', $id)->first();
        $comment['message'] = $message;
        return $comment->save();
    }

    public static function deleteComment($id){
        return Comment::query()->where('id', $id)->delete();
    }
}
