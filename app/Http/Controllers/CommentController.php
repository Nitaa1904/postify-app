<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'post_id' => $postId,
            'comment' => $request->comment,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

}