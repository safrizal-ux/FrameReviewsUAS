<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        // Validate the comment
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Store the comment
        Comment::create([
            'article_id' => $articleId,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        // Redirect back to the article page
        return redirect()->route('article.show', $articleId)->with('success', 'Comment added successfully!');
    }
}
