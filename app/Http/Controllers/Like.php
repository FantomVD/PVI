<?php

namespace App\Http\Controllers;

use App\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Like extends Controller
{
    public function toggleLike(Request $request)
    {
        $post_id = json_decode($request->getContent())->post_id;

        if (isset($post_id)) {
            LikeService::toggleLike($post_id, auth()->user()->id);
        }
        return Redirect::back()->with('message', 'Operation Successful !');
    }
}
