<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $post->likes()->attach(auth()->user()->id);
        return back();
    }

    public function unlike(Post $post)
    {
        $post->likes()->detach(auth()->user()->id);
        return back();
    }
}

