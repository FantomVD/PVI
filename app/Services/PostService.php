<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

class PostService
{
    public static function getAllPosts($search = '%%', $size = 3, $page = 1, $showFiltered = false)
    {
        if ($showFiltered) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });

            return Post::query()->where('title', 'like', "%$search%")->paginate($size);
        }
        return Post::all();
    }

    public static function getPostById($id)
    {
        return Post::query()->where('id', $id)->first();
    }

    public static function createPost($postData)
    {
        $post = new Post();
        $post['title'] = $postData['title'];
        $post['image'] = $postData['image'] ?? '';
        $post['body'] = $postData['body'] ?? '';
        $post->save();
    }

    public static function editPost($id, $postData)
    {
        $post = Post::query()->where('id', $id)->first();

        $post['title'] = $postData['title']?? $post['$title'] ;
        $post['image'] = $postData['image'] ?? $post['image'];
        $post['body'] = $postData['body'] ?? $post['body'];

        $post->save();
    }

    public static function deletePostById($id)
    {
        return Post::query()->where('id', $id)->delete();
    }
}
