<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $path = storage_path('app/posts.txt');

        if (!file_exists($path)) {
            dd("File tidak ditemukan!");
        }

        $posts = file_get_contents($path);
        $posts = trim($posts, "\" \n\r");
        $posts = explode("\n", $posts);

        $view_data = [
            'posts' => $posts
        ];
        
        return view('posts.index', $view_data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $path = storage_path('app/posts.txt');

        if (!file_exists($path)) {
            abort(404, "File tidak ditemukan");
        }

        $posts = file_get_contents($path);
        $posts = explode("\n", trim($posts));

        // Cari post berdasarkan ID
        foreach ($posts as $post) {
            $data = explode(",", $post);
            if ($data[0] == $id) {
                return view('posts.show', ['post' => $data]);
            }
        }

        abort(404, "Post tidak ditemukan");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}