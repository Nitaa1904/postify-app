@extends('layouts.app')

@section('title')
Postify
@endsection

@section('content')
<h1 class="text-center mb-4 d-flex justify-content-between align-items-center flex-wrap">
    <span>Blog Posts</span>
    <a class="btn btn-success" href="{{ url('posts/create') }}">+ Buat Postingan</a>
</h1>

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach($posts as $post)
    <div class="col">
        <div class="card custom-card h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text flex-grow-1">{{ Str::limit($post->content, 150, '...') }}</p>
                <p class="card-text text-muted small">Last Updated:
                    {{ date("d M Y H:i", strtotime($post->created_at)) }}</p>
                <div class="mt-auto">
                    <a href="{{ url("posts/$post->id") }}" class="btn btn-primary btn-sm">Read More</a>
                    <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning btn-sm">Update</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection