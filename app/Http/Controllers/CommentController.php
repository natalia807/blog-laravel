<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'content' => 'required',
    ]);

    $post->comments()->create([
        'content' => $request->content,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('posts.show', $post);
}
}
