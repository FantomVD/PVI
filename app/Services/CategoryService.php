<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryService
{
    public static function getAllCategories(){
       return Category::all();
    }
}
