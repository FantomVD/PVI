<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\LikeService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    public function renderPost(Request $request)
    {
        $req = $request->only('id');
        $comments = CommentService::getComments($req['id']);
        $post = PostService::getPostById($req['id']);
        $like = false;
        $admin = false;

        if (auth()->check()) {
            $findLike = DB::table('likes')->where('post_id', $req['id'])->where('user_id', auth()->user()->id)->first();
            $like=(isset($findLike));
            $admin = auth()->user()->isAdmin;
        }
        $totalLikes= LikeService::totalLikes($req['id']);
        return view('home.post', ["admin"=>$admin, "post"=>$post, "comments"=>$comments,"like"=>$like, "total_likes"=>$totalLikes]);
    }

    public function removePost(Request $request)
    {
        $post = $request->only('id');
        $result = PostService::deletePostById($post['id']);
        return redirect()->to("panel");
    }
}
