<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ideas;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Ideas $idea)
    {
        $comment = new Comment();
        $comment->ideas_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Comment posted successfully!');
    }
}
