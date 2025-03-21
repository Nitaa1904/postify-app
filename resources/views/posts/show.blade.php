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

            <div class="mt-3 text-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-back">Back</a>
            </div>

            <br />
            <br />
            @if(Auth::check())
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Tambahkan Komentar:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            @else
            <p><a href="{{ url('/login') }}">Login</a> untuk berkomentar.</p>
            @endif

            <div class="mt-4">
                <h3 class="mb-3">Komentar</h3>

                @if ($comments->count() > 0)
                <ul class="list-group">
                    @foreach ($comments as $comment)
                    <li class="list-group-item">
                        <p class="mb-1">{{ $comment->comment }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted">Belum ada komentar.</p>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection