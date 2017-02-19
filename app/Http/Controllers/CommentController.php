<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $user = $request->user();

        $comment = $user->comments()->create(array_merge(
            $request->all(),
            ['post_id' => $post->id]
        ));

        return redirect(route('posts.show', $post->id) . "#comment-{$comment->id}");
    }
}
