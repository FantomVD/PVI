<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

class PostService
{
    public static function getPostToEdit($userId, $isAdmin = false)
    {
        if ($isAdmin) {
            return PostService::getAllPosts();
        } else {
            return Post::query()->where('user_id', $userId)->get();
        }
    }

    public static function paginatePosts($search = '%%', $size = 3, $page = 1, $category_id = 0)
    {
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        $query = Post::query()->with(['user']);

        if ($category_id != 0) {
            $query->where('category_id', $category_id);
        }

        return $query->where(function ($subquery) use ($search) {
            $subquery->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhere('title', 'like', "%$search%");
        })->paginate($size);
    }

    public static function getAllPosts()
    {
        return Post::all();
    }

    public static function getPostById($id)
    {
        return Post::query()->with('user')->where('posts.id', $id)->first();
    }

    public static function createPost($postData, $user_id)
    {
        $post = new Post();
        $post['title'] = $postData['title'];
        $post['image'] = $postData['image'] ?? '';
        $post['body'] = $postData['body'] ?? '';
        $post['category_id'] = $postData['category_id'];
        $post['user_id'] = $user_id;

        $post->save();
    }

    public static function editPost($id, $postData)
    {
        $post = Post::query()->where('id', $id)->first();

        $post['title'] = $postData['title']?? $post['$title'] ;
        $post['image'] = $postData['image'] ?? $post['image'];
        $post['body'] = $postData['body'] ?? $post['body'];
        $post['category_id'] = $postData['category_id'] ?? $post['category_id'];

        $post->save();
    }

    public static function deletePostById($id)
    {
        return Post::query()->where('id', $id)->delete();
    }
}
