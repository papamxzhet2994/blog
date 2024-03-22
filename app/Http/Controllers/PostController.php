<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('public.posts', compact('posts'));
    }

    public function create()
    {
        $user_id = Auth::id();
        return view('posts.create', compact('user_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.update', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            return back()->with('error', 'Вы не можете удалить этот комментарий');
        }

        $post->delete();

        return back()->with('success', 'Комментарий успешно удален');
    }
}

