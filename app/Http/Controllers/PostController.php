<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts')
                    ->select('id', 'title', 'content', 'created_at')
                    ->where('active', true)
                    ->get();
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
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        DB::table('posts')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
        return redirect('/posts')->with('success', 'Postingan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = DB::table('posts')
            ->select('id', 'title', 'content', 'created_at')
            ->where('id', '=', $id)
            ->first();

        $view_data = [
            'post' => $post
        ];
        return view('posts.show', $view_data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // menampilkan data yang sudah ada
        $post = DB::table('posts')
            ->select('id', 'title', 'content', 'created_at')
            ->where('id', '=', $id)
            ->first();
        
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

         DB::table('posts')
        ->where('id', $id)
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
        DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('posts');
    }
}