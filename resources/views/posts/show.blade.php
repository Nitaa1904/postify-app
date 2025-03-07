@extends('layouts.app')
@section('title', "Judul: $post->title")
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card custom-card p-4">
            <h2 class="display-5 fw-bold">{{ $post->title }}</h2>
            <p class="blog-post-meta text-muted">Published on
                {{date("d M Y H:i", strtotime($post->created_at )) }} by
                <a href="#" class="text-decoration-none text-dark fw-semibold">Me</a>
            </p>
            <hr>
            <p class="lead">{{ $post->content }}</p>

            <div class="mt-4">
                <h5 class="fw-bold">Comments</h5>
                <!-- menampilkan banyaknya komentar -->
                <small class="text-muted">{{ $total_comments }} Komentar</small>
                @foreach($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="mb-0" style="font-size: 8pt;">{{ $comment->comment }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-3">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection