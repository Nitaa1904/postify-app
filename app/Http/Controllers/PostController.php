<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        
        $posts = Post::active()->get();
        $view_data = [
            'posts' => $posts,
        ];
        
        return view('posts.index', $view_data);
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check()) {
            return redirect('login');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            
        ]);
        
        \Mail::to(Auth::user()->email)->send(new BlogPosted($post));
        
        return redirect('/posts')->with('success', 'Postingan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }

        $post = Post::where('id', '=', $id)->first();
        $comments = $post->comments()->limit(2)->get();
        $total_comments = $post->total_comments();

        $view_data = [
            'post' => $post,
            'comments' => $comments,
            'total_comments' => $total_comments,
        ];
        return view('posts.show', $view_data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        // menampilkan data yang sudah ada
        $post = Post::where('id', '=', $id)->first();
        
        $view_data = [
            'post' => $post
        ];
        // tampilkan datanya di form
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::where('id', $id)
        ->update([
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => now(),
        ]);
        return redirect()->route('posts.show', $id)->with('success', 'Postingan berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
        Post::where('id', $id)->delete();

        return redirect('posts');
    }
}