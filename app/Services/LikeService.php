<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class LikeService
{
    public static function toggleLike($post_id, $user_id)
    {
        $like = DB::table('likes')->select('*')->where('post_id', $post_id)->where('user_id', $user_id)->get();
        if (count($like)>0) {
            $result = DB::table('likes')->where('post_id', $post_id)->where('user_id', $user_id)->delete();
        } else {
            $result = DB::table('likes')->insert(["post_id"=>$post_id, "user_id"=>$user_id]);
        }
        return $result;
    }

    public static function totalLikes($post_id){
        return DB::table('likes')->where('post_id', $post_id)->count();
    }
}
