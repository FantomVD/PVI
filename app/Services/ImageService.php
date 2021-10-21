<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function getAllPosts()
    {
        return Post::all();
    }

    public static function getPostById($id)
    {
        return Post::query()->with('user')->where('id', $id);
    }
}
