<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return back();
    }

    public function destroy(Comment $comment)
    {
        if (auth()->user()->id !== $comment->user_id) {
            return back()->with('error', 'Вы не можете удалить этот комментарий');
        }

        $comment->delete();

        return back()->with('success', 'Комментарий успешно удален');
    }
}
