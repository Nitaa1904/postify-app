@extends('layouts.app')
@section('title', "Judul: $post->title")
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card custom-card p-4 shadow-sm">
            <h2 class="fw-bold text-center text-navy">{{ $post->title }}</h2>
            <p class="blog-post-meta text-muted text-center">
                Published on {{ date("d M Y H:i", strtotime($post->created_at )) }} by
                <a href="#" class="text-decoration-none text-navy fw-semibold">Me</a>
            </p>
            <hr>

            <p class="lead text-justify">{{ $post->content }}</p>

            <div class="mt-4">
                <h5 class="fw-bold text-navy">Comments ({{ $total_comments }})</h5>
                @foreach($comments as $comment)
                <div class="card mb-3 border-0 shadow-sm comment-card">
                    <div class="card-body p-3">
                        <p class="mb-0 small text-muted">{{ $comment->comment }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-3 text-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-back">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection